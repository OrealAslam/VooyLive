<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Flyer;
use Laravel\Cashier\Cashier;
use Carbon\Carbon;
use App\Order;
use App\User;
use Redirect;
use Session;
use App\DiscountCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ProcessEmails;
use App\Credit;

class FlyerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        Cashier::useCurrency('cad');
    }

    public function flyersList(){
        $data['user'] = Auth::User();

        if (Auth::User()->user_type == 1) {
            $clientList = getClientList(Auth::User()->userId);
            $data['flyers'] = Flyer::whereIn('user_id',$clientList)->paginate(config('app.paginate'));
        }else{
            $data['flyers']=Auth::User()->flyers()->paginate(config('app.paginate'));
        }

        return view('account.flyers',$data);
    }

    public function generateFlyer(Request $request) {
        $data = array();
        $user = Auth::User();
        $data['user'] = $user;

        $validateUser = getValidateUser();

        if ($request->isMethod('post')) {
            $rules = array(
                'flyerName' => 'required|max:255',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                //for pay as you go user
                if (in_array($validateUser->plan, config('app.pay_as_you_go_packages'))) {
                    if ($validateUser->subscription('main')->onTrial()) {
                        $params = [
                            'name' => $request->flyerName,
                            'status' => 1,
                            'total' => (double)0,
                            'type'=>'trial'
                        ];
                        return $this->createFlyer($params);
                    } else {
                        $flyerPrice=(double)env('FLYERCHARGE');
                        $credit_price = (double)env('FLYERCHARGE_CREDIT') / 100;
                        if ($validateUser->getBalanceCredits() >= $credit_price) {
                            $mCredit=new Credit();
                            $mCredit->descr = 'PFS Bought';
                            $mCredit->user_id = $validateUser->userId;
                            $mCredit->type = 'product';
                            $mCredit->product = 'pfs';
                            $mCredit->credit = -$credit_price;
                            $mCredit->save();

                            $params = [
                                'name' => $request->flyerName,
                                'status' => 1,
                                'total' => (double)0,
                                'type'=>'credit'
                            ];
                            return $this->createFlyer($params);

                        } else {
                            if ($request->discount != null) {
                                $discount = DiscountCode::where([['code', $request->discount], ['times', '>', 0], ['startDate', "<", Carbon::now()->toDateString()], ['endDate', ">", Carbon::now()->toDateString()]])->first();
                                if ($discount != null) {
                                    if ($discount->type == 'percent') {
                                        $flyerPrice = (int)(((100 - (float)$discount->value) * $flyerPrice) / 100);
                                    } else {
                                        $flyerPrice = (int)(($flyerPrice - ((float)$discount->value * 100)));
                                    }
                                    $discount->times = ($discount->times - 1);
                                    $discount->save();
                                }
                            }                           
                            $tax = (5 / 100);
                            $taxAmount = ($tax * $flyerPrice);
                            $flyerPrice = (int)round(($flyerPrice + $taxAmount),0);
                            $response=$user->charge($flyerPrice);
                            $params = [
                                'name' => $request->flyerName,
                                'status' => 1,
                                'stripe_id'=>$response->id,
                                'total'=>$response->amount,
                                'type'=>'paid'
                            ];
                            return $this->createFlyer($params);
                        }
                    }
                } elseif (in_array($validateUser->plan, config('app.monthly_packages'))) {
                    $params = [
                        'name' => $request->flyerName,
                        'status' => 1,
                        'total' => (double)0,
                    ];
                    if ($validateUser->subscription('main')->onTrial()) {
                        $params['type'] = 'trial';
                        return $this->createFlyer($params);
                    } else {
                        $params['type'] = 'paid';
                        return $this->createFlyer($params);
                    }
                }
            }
        }
    }

    public function createFlyer($data) {
        $user = Auth::User();
        try{
            $flyer = $user->flyers()->create($data);
            $flyerId=$flyer->id;

            //send email
            $data = array (
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'flyerId' => $flyer->id,
                    'userId' => $user->userId,
                    'flyerName' => $flyer->name,
                    'amount' => (double)($flyer->total / 100),
                    'flyerDate' => $flyer->created_at,
                    'userEmail' => $user->email,
                    'type' => 'buyPFSReport'
                    );
            ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');


            $response=Storage::exists('flyers/sample.json');
            if ($response==true) {
                $flyerData=Storage::get('flyers/sample.json');
                Storage::put('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json', $flyerData);
            }
            return (array('status'=>1, 'flyerId'=> $flyerId, 'userId' => $user->userId, 'msg'=>'Flyer Created Successfully'));
        }
        catch(Exception $e) {
            return (array('status'=>0, 'msg'=>'Unable to create Flyer at the moment'));
        }
    }

    public function viewFlyer(Request $request, $flyerId, $userId) {
        $data = array();
        $data['flyerId'] = $flyerId;
        $data['userId'] = $userId;
        $data['editMode'] = false;

        if (Auth::check()) {
            $user=Auth::User();
            $user = User::where('userId', $user->userId)->first();
            if ($user->role != 'admin') {
                if (in_array($userId, getClientList($userId))) {
                    $flyer=Flyer::where([['user_id',$userId],['id',$flyerId]])->count();
                    if($flyer == 0) {
                        Session::flash('error_msg', 'Access Denied');
                        return redirect(route('flyers-list'));
                    }
                    $data['editMode'] = true;
                } else {
                    Session::flash('error_msg', 'Access Denied');
                    return redirect(route('flyers-list'));
                }
            } else {
                $user = User::where('userId', $userId)->first();
                $flyer=Flyer::where([['user_id',$userId],['id',$flyerId]])->count();
                if($flyer == 0) {
                    return redirect(route('dashboard'));
                }
            }
        } else {
            $user = User::where('userId', $userId)->first();
            $flyer=Flyer::where([['user_id',$userId],['id',$flyerId]])->count();
            if($flyer == 0) {
                return redirect(route('home'));
            }
        }
        $flyer = Flyer::findOrfail($flyerId);
        $data['user'] = $user;
        $data['flyer'] = $flyer;
        if ($request->isMethod('post')) {
            $response=Storage::exists('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json');
            if ($response==true) {
                $flyerData=Storage::get('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json');
                $flyerData = json_decode($flyerData, true);
                $flyerData[$request->flyer_field_id] = trim($request->flyer_field_value);
                $flyerData = json_encode($flyerData);
                if (Storage::put('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json', $flyerData)) {
                    return (array('status'=>1, 'msg'=>'Flyer updated Successfully'));
                } else {
                    return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
                }
            } else {
                return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
            }
        } else {
            $response=Storage::exists('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json');
            if ($response==true) {
                $flyerData=Storage::get('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json');
            } else {
                $response=Storage::exists('flyers/sample.json');
                if ($response==true) {
                    $flyerData=Storage::get('flyers/sample.json');
                    Storage::put('flyers/'.$user->userId.'/'.$flyerId.'/'.$flyerId.'.json', $flyerData);
                }
            }
        }
        $flyerData = json_decode($flyerData);

        $details=$user->ClientDetail;
        $data['user_details'] = $details;
        $userFlyerImagePath = 'flyers/'.$request->userId.'/'.$flyerId.'/';
        $data['flyerData'] = $flyerData;
        $data['flyer_images'] = array(
            'img1' => Storage::disk('s3')->has($userFlyerImagePath.'img1.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img1.jpeg' : '/img/flyer/img1.jpg',
            'img2' => Storage::disk('s3')->has($userFlyerImagePath.'img2.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img2.jpeg' : '/img/flyer/img2.jpg',
            'img3' => Storage::disk('s3')->has($userFlyerImagePath.'img3.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img3.jpeg' : '/img/flyer/img3.jpg',
            'img4' => Storage::disk('s3')->has($userFlyerImagePath.'img4.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img4.jpeg' : '/img/flyer/img4.jpg',
            'img5' => Storage::disk('s3')->has($userFlyerImagePath.'img5.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img5.jpeg' : '/img/flyer/img5.jpg',
            'img6' => Storage::disk('s3')->has($userFlyerImagePath.'img6.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img6.jpeg' : '/img/flyer/img6.jpg',
            'img7' => Storage::disk('s3')->has($userFlyerImagePath.'img7.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img7.jpeg' : '/img/flyer/img7.jpg',
            'img8' => Storage::disk('s3')->has($userFlyerImagePath.'img8.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img8.jpeg' : '/img/flyer/img8.jpg',
            'img9' => Storage::disk('s3')->has($userFlyerImagePath.'img9.jpeg') ? env('AWS_URL').$userFlyerImagePath.'img9.jpeg' : '/img/flyer/img9.jpg',
        );

        //$data['flyerData'] = str_replace($search_str,$replace_str,$data['flyerData']);
        return view('flyer.view',$data);
    }
    public function updateImage(Request $request, $flyerId, $userId)
    {
        if ($request->isMethod('post')) {

            $fieldName = $request->img_name;
            $rules = array(
                $fieldName => 'image|max:2000',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return (array('status'=>0, 'msg'=>$errors->first($fieldName)));
            } else {
                if($request->hasFile($fieldName) && $request->file($fieldName)->isValid()){
                    $imageName = 'flyers/'.$userId.'/'.$flyerId.'/'.$fieldName.'.jpeg';
                    if($imageName!=null)
                        Storage::delete($imageName);
                    $filename = $request->file($fieldName)->storeAs('flyers/'.$userId.'/'.$flyerId.'/', $fieldName.'.jpeg');
                    return (array('status'=>1, 'msg'=>'Image updated Successfully'));
                } else {
                    return (array('status'=>0, 'msg'=>'unable to updated Image'));
                }
            }
        }
    }

}
