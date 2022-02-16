<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Report;
use App\UserReport;
use App\dataApi;
use App\Order;
use Auth;
use App\DiscountCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ProcessEmails;
use Laravel\Cashier\Cashier;
use App\Credit;
use App\Province;
use App\City;

class ReportCont extends Controller
{
    public $reportPerDayLimitMsg = '';

    public function __construct()
    {
        $this->middleware('auth');
        Cashier::useCurrency('cad');

        $this->reportPerDayLimitMsg = 'You have reached the maximum numbers of reports you can run today. During the trail period you can run a max of ' . config('app.reportPerDayInTrial') . ' reports a day';
    }
    public function generateReport(Request $request)
    {
        $mOrder = new Order();
        $data = array();
        $data['user'] = Auth::User();
        $validateUser = getValidateUser();
        $city = City::where('name', $request->report_city)->first();
        if (!$city) {
            $province = Province::where('name', $request->province)->first();
            $province_id = $province->id;
            $new_city = City::create(['name' => $request->report_city, 'province_id' => $province_id, 'status' => 1]);
            $city_id = $new_city->id;
        } else {
            $city_id = $city->id;
        }

        $user = $request->user();
        if ($request->has('long') && $request->has('lat')) {
            //chekc if report is already exists otherwise 
            $reportPrice = 0;
            $report = Report::where([['long', $request->long], ['lat', $request->lat]])->get()->first();
            if ($report == null) {
                $report = new Report();
                $report->long = $request->long;
                $report->lat = $request->lat;
                $report->address = $request->address;
                $report->postal_code = $request->postal_code;
                $report->street_number = $request->street_number;
                $report->route = $request->route;
                $report->locality = $request->locality;
                $report->administrative_area_level_1 = $request->administrative_area_level_1;
                $report->city_id = $city_id;
                $report->status = 0;
                $report->save();
            }

            if (Auth::user()->role == 'client') {
                //for pay as you go user
                if (in_array($validateUser->plan, config('app.pay_as_you_go_packages'))) {
                    //check if report is already owned by the user
                    $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->count();
                    if ($order == 0) {
                        //dont charge the user if he is on trial
                        if ($validateUser->subscription('main')->onTrial()) {
                            $getTodayTotalReportByUser = $mOrder->isDailyLimitReachedForTrialUser($user->userId);
                            if ($getTodayTotalReportByUser) {
                                return (array('status' => 0, 'msg' => $this->reportPerDayLimitMsg));
                            } else {
                                $reportPrice = (float)0;
                                Order::create(['userId' => $user->userId, 'reportId' => $report->reportId, 'total' => $reportPrice, 'type' => 'trial']);
                            }
                        } else {
                            $reportPrice = (float)env('REPORTCHARGE');
                            $credit_price =  (float)env('REPORTCHARGE_CREDIT') / 100;
                            try {
                                if ($validateUser->userCredit() >= $credit_price) {
                                    $mCredit = new Credit();
                                    $mCredit->descr = 'Cfs Bought';
                                    $mCredit->user_id = $user->userId;
                                    $mCredit->type = 'product';
                                    $mCredit->product = 'cfs';
                                    $mCredit->credit = -$credit_price;
                                    $mCredit->save();

                                    $reportPrice = (float)0;
                                    Order::create(['userId' => $user->userId, 'reportId' => $report->reportId, 'total' => $reportPrice, 'type' => 'credit']);
                                } else {
                                    if ($request->discount != null) {
                                        $discount = DiscountCode::where([['code', $request->discount], ['times', '>', 0], ['startDate', "<", Carbon::now()->toDateString()], ['endDate', ">", Carbon::now()->toDateString()]])->first();
                                        if ($discount != null) {
                                            if ($discount->type == 'percent') {
                                                $reportPrice = (int)(((100 - (float)$discount->value) * $reportPrice) / 100);
                                            } else {
                                                $reportPrice = (int)(($reportPrice - ((float)$discount->value * 100)));
                                            }
                                            $discount->times = ($discount->times - 1);
                                            $discount->save();
                                        }
                                    }

                                    //apply tax
                                    //echo $reportPrice.'<br>';
                                    $tax = (5 / 100);
                                    //echo $tax.'<br>';
                                    $taxAmount = ($tax * $reportPrice);
                                    //echo $taxAmount.'<br>';
                                    $reportPrice = (int)round(($reportPrice + $taxAmount), 0);
                                    //echo $reportPrice.'<br>';
                                    //die();

                                    $response = $user->charge($reportPrice);
                                    /*
                                    echo '<pre>';
                                    print_r($response);
                                    die();
                                    */
                                    Order::create(['userId' => $user->userId, 'reportId' => $report->reportId, 'stripe_id' => $response->id, 'total' => $response->amount, 'type' => 'paid']);
                                }
                            } catch (Exception $e) {
                                //$e->getMessage();
                                //die();
                                return response('Failed To Charge Card', 400);
                            }
                            //$order_create=true;
                        }
                    }
                } elseif (in_array($validateUser->plan, config('app.monthly_packages'))) {
                    $reportPrice = 0;
                    $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->count();
                    if ($order == 0) {
                        if ($validateUser->subscription('main')->onTrial()) {
                            $getTodayTotalReportByUser = $mOrder->isDailyLimitReachedForTrialUser($user->userId);
                            if ($getTodayTotalReportByUser) {
                                return (array('status' => 0, 'msg' => $this->reportPerDayLimitMsg));
                            } else {
                                $orderData = ['userId' => $user->userId, 'reportId' => $report->reportId, 'total' => $reportPrice, 'type' => 'trial'];
                                //print_r($orderData);die();
                                Order::create($orderData);
                            }
                        } else {
                            $orderData = ['userId' => $user->userId, 'reportId' => $report->reportId, 'total' => $reportPrice, 'type' => 'paid'];
                            //print_r($orderData);die();
                            Order::create($orderData);
                        }
                    }
                }
                $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->get()->first();
            } elseif (Auth::user()->role == 'admin') {
                if ($request->has('edit_report_address') && $request->input('edit_report_address') == 'address') {
                    //check if user have bought already report of the new address
                    $order = Order::where([['userId', $request->input('current_user_id')], ['reportId', $report->reportId]])->count();
                    if ($order > 0) {
                        return (array('status' => 0, 'msg' => 'user already have report with with new address'));
                    } else {
                        //check if record exists with current_user_id & current_report_id
                        $order = Order::where([['userId', $request->input('current_user_id')], ['reportId', $request->input('current_report_id')]])->count();
                        if ($order > 0) {
                            if (Order::where([['userId', $request->input('current_user_id')], ['reportId', $request->input('current_report_id')]])->update(['reportId' => $report->reportId])) {
                            } else {
                                return (array('status' => 0, 'msg' => 'unable to update current order report'));
                            }
                            //$orderData = ['userId'=>$user->userId,'reportId'=>$report->reportId,'total'=>$reportPrice, 'type'=>'trial'];
                            //Order::create($orderData);
                        } else {
                            return (array('status' => 0, 'msg' => 'old Record not found to modify'));
                        }
                    }
                    $order = Order::where([['userId', $request->input('current_user_id')], ['reportId', $report->reportId]])->get()->first();
                } else {
                    $reportPrice = 0;
                    $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->count();
                    if ($order == 0) {
                        $orderData = ['userId' => $user->userId, 'reportId' => $report->reportId, 'total' => $reportPrice, 'type' => 'trial'];
                        Order::create($orderData);
                    }
                    $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->get()->first();
                }
            }

            //send email
            $data = array(
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'reportId' => $order->reportId,
                'userId' => $order->userId,
                'orderId' => $order->orderId,
                'orderReportAddress' => $report->address,
                'orderAmount' => (float)($order->total / 100),
                'orderDate' => $order->created_at,
                'userEmail' => $user->email,
                'type' => 'buyReport'
            );
            ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');


            return ['status' => 1, 'reportId' => $order->reportId, 'userId' => $order->userId];
        } else {
            return response('Invalid Address ', 400);
        }
        //create relation of user and report
        /*
            $userReport=new UserReport();
            $userReport->user_id = $data['user']->userId;
            $userReport->report_id = $report->reportId;
            $userReport->save();
            */
        /*
            $userReport = UserReport::updateOrCreate(
                ['user_id' => $data['user']->userId, 'report_id' => $report->reportId]
            );
            */
    }
    public function viewDetailedReport($reportId)
    {
        $data['report'] = Report::findOrfail($reportId);
        return view('reports.detailedReport', $data);
    }

    public function checkUserReportAccess(Request $request)
    {
        $data = array();
        $data['user'] = Auth::User();

        $user = $request->user();

        if ($request->has('long') && $request->has('lat')) {
            $report = Report::where([['long', $request->long], ['lat', $request->lat]])->get()->first();
            if ($report == null) {
                return ['status' => 0];
            } else {
                $order = Order::where([['userId', $user->userId], ['reportId', $report->reportId]])->count();
                if ($order == 0) {
                    return ['status' => 0];
                } else {
                    return ['status' => 1, 'reportId' => $report->reportId, 'userId' => $user->userId];
                }
            }
        } else {
            return response('Invalid Address ', 400);
        }
    }
}
