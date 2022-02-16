<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transactions;
use App\Order;
use App\ClientDetail;
use App\UserReport;
use App\User;
use App\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PDF;
use Illuminate\Support\Facades\DB;
use Session;
use App\Plan;
use Validator;
use Redirect;
use App\ReportNotes;
use App\Flyer;
use App\Hdi;
use App\UserProduct;
use App;

class AccountCont extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User;
        $this->order = new Order;
        $this->plan = new Plan;
        $this->transactions = new Transactions;
        $this->flyer = new Flyer;
        $this->hdi = new Hdi;
    }

    public function charge(){
        $user=Auth::user();
        try{
            $response=$user->charge(env('REPORTCHARGE'));

            //Order::create(['userId'])
            return 'success';
        }
        catch(Exception $e){
            return 'failed';
        }
    }

    public function index(){
        $data['user']=Auth::User();
        $data['sidebar']=view('account.accountSidebar',$data);
        $data['user']=Auth::User();
        return view('account.account',$data);
    }

    public function adminDashboard(){
        if(Auth::user()->role == 'admin'){
            
            $currentWeekNumber = date("W",strtotime(date('Y-m-d')));
            $lastWeekNumber = ($currentWeekNumber-1);
            $totalOrderFromLastWeek = $this->order->getTotalOrderFromLastWeek($lastWeekNumber);
            $totalSalesFromLastWeek = $this->transactions->getTotalSalesFromLastWeek($lastWeekNumber)/100;
            $totalCustmorFromLastWeek = $this->user->getTotalCustmorFromLastWeek($lastWeekNumber);

            $totalFpsOrderFromLastWeek = $this->flyer->getTotalFpsOrderFromLastWeek($lastWeekNumber);
            $totalFpsSalesFromLastWeek = $this->flyer->getTotalFpsSalesFromLastWeek($lastWeekNumber);
            
            $totalHdiOrderFromLastWeek = $this->hdi->getTotalHdiOrderFromLastWeek($lastWeekNumber);
            $totalHdiSalesFromLastWeek = $this->hdi->getTotalHdiSalesFromLastWeek($lastWeekNumber);

            // plan pie char  -----------
            $planData = $this->plan->getPlan();
            $plantTotal = [];
            if(!empty($planData) && $planData->count()){
                foreach ($planData as $key => $value) {
                    $plantTotal[$key]['name'] = $value->name;
                    $plantTotal[$key]['total'] = $this->user->getPlanTotal($value->planId);
                    $plantTotal[$key]['fromLastWeek'] = $this->user->getPlanFromLastWeekTotal($value->planId,$lastWeekNumber);
                }
            }

            $totalUser = $this->user->getTotalUser();
            $planPieChartArray = [];
            $planTotalSum = 0;
            if(!empty($plantTotal)){
                foreach ($plantTotal as $key => $value) {
                    $planPieChartArray[$key]['name'] = $value['name'];
                    if(!empty($totalUser)){
                        $planPieChartArray[$key]['y'] = round(($value['total'] * 100) / $totalUser,2);
                    }else{
                        $planPieChartArray[$key]['y'] = 0;
                    }
                    $planTotalSum = $planTotalSum + $value['total'];
                }
            }
            $otherKey = count($planPieChartArray);
            $planPieChartArray[$otherKey]['name'] = 'Other';
            if(!empty($totalUser)){
                $planPieChartArray[$otherKey]['y'] = round((($totalUser-$planTotalSum) * 100) / $totalUser,2);
            }else{
                $planPieChartArray[$otherKey]['y'] = 0;
            }
            $planPieChartArray = json_encode($planPieChartArray);
            

            // yearly ------------------
            $columnChartMoneyMo = [];            
            if(!empty($planData) && $planData->count()){
                foreach ($planData as $key => $value) {
                    $columnChartMoneyMoData = $this->order->getColumnChartMoneyMonthly($value->planId);
                    $columnChartMoneyMo[$key]['name'] = $value->name;
                    $columnChartMoneyMo[$key]['data'] = $this->createColumnChartMoneyMonthlyArray($columnChartMoneyMoData);
                }
            }
            $columnChartMoneyMo = json_encode($columnChartMoneyMo);


            // weekly ------------------------
            $result = [];
            if(!empty($planData) && $planData->count()){
                foreach ($planData as $key => $value) {
                    $columnChartMoneyWkData = $this->order->getColumnChartMoneyWeekly($value->planId);
                    $result = $this->createColumnChartMoneyWeeklyArray($result, $columnChartMoneyWkData, $value->planId);
                }
            }
            $wkWeekArray = json_encode(array_column($result, "week"));
            $columnChartMoneyWk = [];
            if(!empty($planData) && $planData->count()){
                foreach ($planData as $key => $value) {
                    $columnChartMoneyWk[$key]['name'] = $value->name;
                    $columnChartMoneyWk[$key]['data'] = array_column($result, $value->planId);
                }
            }
            $columnChartMoneyWk = json_encode($columnChartMoneyWk);

            // day ------------------------- 
            $currentMonthTotalDays = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
            for ($i=1; $i <= $currentMonthTotalDays; $i++) { 
                $currentMonthTotalDaysArray[] = $i;
            }
            $currentMonthTotalDaysArray = json_encode($currentMonthTotalDaysArray);

            $columnChartMoneyD = [];            
            if(!empty($planData) && $planData->count()){
                foreach ($planData as $key => $value) {
                    $columnChartMoneyDData = $this->order->getColumnChartMoneyDay($value->planId);
                    $columnChartMoneyD[$key]['name'] = $value->name;
                    $columnChartMoneyD[$key]['data'] = $this->createColumnChartMoneyDayArray($columnChartMoneyDData);
                }
            }
            $columnChartMoneyD = json_encode($columnChartMoneyD);

            // add var compact = // 'totalPayAsYouGo','totalMonthly','totalYearly',

            return view('admin.dashboard',compact('totalUser','planPieChartArray','currentMonthTotalDaysArray','wkWeekArray','columnChartMoneyMo','columnChartMoneyD','columnChartMoneyWk','plantTotal','totalOrderFromLastWeek','totalSalesFromLastWeek','totalCustmorFromLastWeek','totalFpsOrderFromLastWeek','totalFpsSalesFromLastWeek','totalHdiOrderFromLastWeek','totalHdiSalesFromLastWeek'));
        }
        $data['user']=Auth::User();
        //$data['hide_top_address_search'] = false;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        return view('account.dashboard',$data, compact('cityArray'));
    }

    public function dashboard(){
        $data['user']=Auth::User();
        //$data['hide_top_address_search'] = false;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        return view('account.dashboard',$data, compact('cityArray'));
    }


    public function communityFeatureSheet(){
        $data['user']=Auth::User();
        $data['hide_top_address_search'] = true;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        return view('account.communityFeatureSheet',$data, compact('cityArray'));
    }

    public function propertyFeatureSheet(){
        $data['user']=$user=Auth::User();
        $data['user_details']=$user_details=Auth::User()->ClientDetail;
        //$data['hide_top_address_search'] = false;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        $showMissingInfoModal = false;

        if (empty($user->firstName) && empty($user->lastName)) {
            $showMissingInfoModal = true;
        }
        if (empty($user_details->phone)) {
            $showMissingInfoModal = true;
        }
        if (empty($user_details->email)) {
            $showMissingInfoModal = true;
        }
        if (!isset($user_details->photo)) {
            $showMissingInfoModal = true;
        }
        if (!isset($user_details->logo)) {
            $showMissingInfoModal = true;
        }

        $data['showMissingInfoModal'] = $showMissingInfoModal;

        return view('account.propertyFeatureSheet',$data, compact('cityArray'));
    }

    public function houseDetailsInfographic(){
        $data['user']=$user=Auth::User();
        $data['user_details']=$user_details=Auth::User()->ClientDetail;
        //$data['hide_top_address_search'] = false;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        $showMissingInfoModal = false;

        if (empty($user->firstName) && empty($user->lastName)) {
            $showMissingInfoModal = true;
        }
        if (empty($user_details->phone)) {
            $showMissingInfoModal = true;
        }
        if (empty($user_details->email)) {
            $showMissingInfoModal = true;
        }
        if (!isset($user_details->photo)) {
            $showMissingInfoModal = true;
        }
        if (!isset($user_details->logo)) {
            $showMissingInfoModal = true;
        }

        $data['showMissingInfoModal'] = $showMissingInfoModal;

        return view('account.houseDetailsInfographic',$data, compact('cityArray'));
    }


    public function createColumnChartMoneyMonthlyArray($columnChartMoneyMonthly)
    {
        $result = [];
        for ($i=1; $i <= 12; $i++) { 
            if(!empty($columnChartMoneyMonthly)){
                $columnChartMoneyMonthly = array_column($columnChartMoneyMonthly, NULL, 'month');
                if(isset($columnChartMoneyMonthly[$i])){
                    $result[$i] = (int)$columnChartMoneyMonthly[$i]['total'];
                }else{
                    $result[$i] = 0;
                }
            }else{
                $result[$i] = 0;
            }
        }
        return array_values($result);
    }

    public function createColumnChartMoneyDayArray($columnChartMoneyDay)
    {

        $result = [];
        $max = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
        for ($i=1; $i <= $max; $i++) { 
            if(!empty($columnChartMoneyDay)){
                $columnChartMoneyDay = array_column($columnChartMoneyDay, NULL, 'day');
                if(isset($columnChartMoneyDay[$i])){
                    $result[$i] = (int)$columnChartMoneyDay[$i]['total'];
                }else{
                    $result[$i] = 0;
                }
            }else{
                $result[$i] = 0;
            }
        }
        return array_values($result);
    }

    public function createColumnChartMoneyWeeklyArray($result, $data, $type)
    {
        if(!empty($data)){
            foreach ($data as $key => $value) {
                if(isset($result[$value['week']])){
                    $result[$value['week']][$type] = (int)$value['total'];
                }else{
                    $result[$value['week']]['week'] = (int)$value['week'];
                    $result[$value['week']]['week_date'] = (int)$value['week'];
                    $result[$value['week']]['payasyougo'] = 0;
                    $result[$value['week']]['monthly'] = 0;
                    $result[$value['week']]['yearly'] = 0;
                    $result[$value['week']][$type] = (int)$value['total'];
                }
            }
        }
        return $result;
    }

    public function transactions(){

        $data['user']=Auth::User();

        $data['sidebar']=view('account.accountSidebar',$data);

        $data['transactions'] = Auth::User()->orders()->paginate(config('app.paginate'));

        $data['product'] = UserProduct::where('user_id',Auth::User()->userId)->get();
        
        return view('account.transactions',$data);
    }

    public function transactionsPDF(Request $request)
    {
        $data['user']=Auth::User();
        $data['sidebar']=view('account.accountSidebar',$data);
        $data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));

        view()->share('transactions',$data['transactions']);
        if($request->has('download')){
            $pdf = PDF::loadView('account.transactions');
            return $pdf->download('account.transactions');
        }
        return view('account.transactions',$data);
    }

    public function recharge(){
        $data['user']=Auth::User();
        $data['sidebar']=view('account.accountSidebar',$data);
        return view('account.recharge',$data);
    }

    public function rechargeAccount(Request $request){
        $this->validate($request, [
                'amount'=>'required|numeric|min:50'
                ]);

        $user=Auth::User();
        try {
            $response = $user->charge($request->input('amount'));
            if($response->status=='succeeded'){
                $transaction=new transactions;
                $transaction->userId=$user->userId;
                $transaction->code=$response->id;
                $transaction->amount=$response->amount;
                $transaction->save();
            }
            return back()->with('status','Account Recharged!!');
        } catch (Exception $e) {
            return back()->with('status','Recharge Unsuccessfull!!');
            //
        }
    }


    // public function manage(){

    //     $data['user']=$user=Auth::User();
    //     $data['sidebar']=view('account.accountSidebar',$data);
    //     $data['startDate']=false;
    //     $data['renews_at']=false;
    //     $data['endDate']=false;
        
    //     $data['trial_ends_at']=false;
    //     if($user->subscribed('main',$user->plan)==false){
    //         $data['status']='No Active Subscription';
    //         $data['subscribed']=false;
    //         $data['plan']='No Active Plan';
    //     }
    //     else
    //     {
    //         $data['subscribed']=true;
    //         if ($user->subscribed('main',$user->plan)) {
    //             $plan = Plan::where('planId', $user->plan)->first();
    //             $data['plan'] = $plan->name;
    //         } else {
    //             $data['plan'] = 'No Active Plan';
    //         }
    //         //$data['plan']=($user->subscribed('main',$user->plan)?$user->plan:'No Active Plan');

    //         if ($user->subscription('main')->onTrial()) {
    //             $data['status']='Trialing';
    //             $data['trial_ends_at']=$user->subscription('main')->trial_ends_at;
                
    //         }else{
    //             $data['status']='User Active '; 
    //             $data['startDate']=$user->subscription('main')->created_at; 
    //             $data['startDate'] = ($data['startDate'] != '') ? date("Y-m-d", strtotime($data['startDate'])) : $data['startDate'];
    //             if ($user->subscription('main')->cancelled()) {
    //                 $data['endDate']=$user->subscription('main')->ends_at;
    //                 $data['endDate'] = ($data['endDate'] != '') ? date("Y-m-d", strtotime($data['endDate'])) : $data['endDate'];
    //                 $data['status'] .= '- Subscription Cacnceled';
    //                 $data['subscribed']=false;
    //             } else {
    //                 $data['renews_at']=$user->subscription('main')->renews_at;
    //                 $data['renews_at'] = ($data['renews_at'] != '') ? date("Y-m-d", strtotime($data['renews_at'])) : $data['renews_at'];
    //                 $data['status'] .= '- Subscription Active';
    //             }
    //         }
    //     }
        

    //     return view('account.manage',$data);
    // }

    // public function manageInfo(Request $request){
    //     $user=$request->user();
    //     try{
    //         $user->updateCard($request->input('cc_token'));
    //         return redirect('account/manage')->with('status','Payment Info Update');
    //     }
    //      catch (\Exception $e) {
    //         return back()->withErrors(['message' => 'Error Updating Payment Method.']);
    //     }
    // }

    public function updateCard(){

        $data['user']=$user=Auth::User();
        $data['sidebar']=view('account.accountSidebar',$data);
        $data['startDate']=false;
        $data['renews_at']=false;
        $data['endDate']=false;
        
        $data['trial_ends_at']=false;

        return view('account.updateCard',$data);
    }

    public function updateCardInfo(Request $request){
        $user=$request->user();
        try{
            $user->updateCard($request->input('cc_token'));
            return redirect('account/updateCard')->with('status','Payment Info Update');
        }
         catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error Updating Payment Method.']);
        }
    }

    public function profileview(Request $request){

        //$url = $request->fullUrl();
        if ($request->has('img')) {
            $data['img'] = $request->input('img');
        }

        $data['user'] = $user = Auth::User();
        $details=Auth::User()->ClientDetail;
        $data['plan'] = Plan::where('planId', $user->plan)->first();
        if($details==null)
            $details=new ClientDetail;
        $data['details']=$details;
        $data['sidebar']=view('account.accountSidebar',$data);

        $cityArray = City::pluck('name','id')->all();
        $data['cityArray']=$cityArray;

        $data['default_colors'] = [
                            'colora'=> '#000000',
                            'colorb'=> '#ffffff',
                            'colorc'=> '#aaaaaa',
                            'colord'=> '#e06666',
                            'colore'=> '#aaaaaa',
                            'colorf'=> '#000000',
                        ];

        return view('account.profileview',$data);
    }

    public function profile(){
        $data['user']=Auth::User();
        $details=Auth::User()->ClientDetail;
        if($details==null)
            $details=new ClientDetail;
        $data['details']=$details;
        $data['sidebar']=view('account.accountSidebar',$data);
        return view('account.profile',$data);
    }

    public function updateProfile(Request $request){
        
        if ($request->isMethod('post')) {

            $rules = array(
                'title' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone'    => 'required|max:255',
                'photo' => 'image|max:1000',
                'logo' => 'image|max:1000',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $details=$request->user()->ClientDetail;
                if($details==null){
                   $details=new ClientDetail();
                   $details->userId=$request->user()->userId;
                }
                $details->title=$request->title;
                $details->email=$request->email;
                $details->phone=$request->phone;
                $details->colora= !empty($request->colora) ? $request->colora : 'rgb(0, 0, 0)';
                $details->colorb= !empty($request->colorb) ? $request->colorb : 'rgb(0, 0, 0)';
                $details->colorc= !empty($request->colorc) ? $request->colorc : 'rgb(255, 255, 255)';
                $details->colord= !empty($request->colord) ? $request->colord : 'rgb(80, 86, 100)';
                $details->colore= !empty($request->colore) ? $request->colore : 'rgb(199, 217, 35)';
                if($request->hasFile('photo') && $request->file('photo')->isValid()){
                    $filename=$details->photo;
                    if($filename!=null)
                        Storage::delete($filename);
                    $filename=$request->photo->store('vendors');
                    //$contents = Storage::get('file.jpg');
                    $details->photo=$filename;
                  
                }
                if($request->hasFile('logo') && $request->file('logo')->isValid()){
                    $filename=$details->logo;
                    if($filename!=null)
                        Storage::delete('vendors/'.$filename);
                    $filename=$request->logo->store('vendors');
                    $details->logo=$filename;
                  
                }
                $details->save();
                return redirect('/account/profileview')->with('status','Saved!!');
            }
        }
    }

public function changePassword()
    {
       return view('account.changePassword'); 
    }

    public function storeChangePassword(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required_with:password|max:8',
            'password' => 'confirmed|max:8',
        ]);

        $user = \Auth::user();
        $hashedPassword = $user->password;

        if (!\Hash::check($request->input('current_password'), $hashedPassword)) { 

            return view("account.changePassword")->with('messageType', 'danger')->with("message", "Password does not match.");
        } else {
            $user->fill([
                'password' => bcrypt($request->input('password'))
            ])->save();
           
            return view("account.changePassword")->with('messageType', 'success')->with("message", "Your password has been changed.");
        }

    }

    public function reportsOwned(){
        $data['user']=Auth::User();
        /*
        $records=Auth::User()->UserReport;
        $data['records']=$records;
        */
        //$data['records'] = DB::table('user_reports')->paginate(2);
        $data['total_records'] = UserReport::where('user_id','=',$data['user']->userId)->count();
        $data['records'] = UserReport::where('user_id', '=', $data['user']->userId)->paginate(2);
        $data['sidebar']=view('account.accountSidebar',$data);

        return view('account.reports',$data);
    }



    public function invoices(){
        $user = $data['user']=Auth::User();
        $data['invoices'] = $user->invoices();
        return view('account.invoices',$data);
    }


    public function reportNotes(Request $request, $reportId) 
    {
        $user=Auth::User();
        $user = User::where('userId', $user->userId)->first();

        $data = array();
        $data['userId'] = $user->userId;
        $data['reportId'] = $reportId;
        $locale = App::getLocale();
        if($locale == 'fr') {
            $allPoints = array (
                1 => 'Un quartier confortable et convivial avec une forte présence familiale, des maisons charmantes {Sweet Grass} et des magasins uniques remplissent ses rues d’un sentiment de familiarité bienvenue.',
                2 => 'À quelques minutes du {park} et des {ravines}, préparez-vous à profiter de randonnées à pied et à vélo grâce à un espace de parc abondant qui est parfait pour les pique-niques spontanés et les plaisirs en plein air en toutes saisons.',
                3 => 'Un accès pratique à l’autoroute {Anthony Henday} aide les résidents à profiter d’un voyage rapide de 15 minutes au centre-ville, ce qui rend cette communauté idéale pour les navetteurs.'
            );
        } else {
            $allPoints = array (
                1 => 'A cozy, friendly neighbourhood with a strong family presence, {Sweet Grass} charming homes and unique shops fill its streets with a sense of welcomed familiarity.',
                2 => 'Just minutes from the {park} and {ravines} , get ready to enjoy walking and biking trips through abundant park space that is perfect for spontaneous picnics and outdoor fun in all seasons.',
                3 => 'Convenient access to the {Anthony Henday} Expressway helps residents to enjoy a quick 15-minute trip to the downtown core, making this community ideal for commuters.'
            );
        }
        $data['defaultPoints'] = $allPoints;

        $order=Order::where([['userId',$user->userId],['reportId',$reportId]])->count();
        if($order == 0) {
            Session::flash('error_msg', 'Access Denied');
            return redirect(route('orders'));
        } else {
            $reportNotesRec = ReportNotes::where([['userId',$user->userId],['reportId',$reportId]])->count();
            if($reportNotesRec == 0) {
                $data['all_points'] = $allPoints;
            } else {
                $reportNotesRec = ReportNotes::where([['userId',$user->userId],['reportId',$reportId]])->first();
                $data['all_points'] = array (
                                        1 => $reportNotesRec->point_1,
                                        2 => $reportNotesRec->point_2,
                                        3 => $reportNotesRec->point_3,
                                    );
            }
            if ($request->isMethod('post')) {
                $rules = array(
                    'point_1' => 'max:255',
                    'point_2' => 'max:255',
                    'point_3' => 'max:255',
                );
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $reportNotesRec = ReportNotes::where([['userId',$user->userId],['reportId',$reportId]])->count();
                    if($reportNotesRec == 0) {
                        $reportNotes = new ReportNotes();
                        $reportNotes->reportId=$reportId;
                        $reportNotes->userId=$user->userId;
                    } else {
                        $reportNotes = ReportNotes::where([['userId',$user->userId],['reportId',$reportId]])->first();
                    }
                    $reportNotes->point_1=$request->point_1;
                    $reportNotes->point_2=$request->point_2;
                    $reportNotes->point_3=$request->point_3;

                    if ($reportNotes->save()) {
                        //return redirect('/account/profileview')->with('status','Saved!!');
                        return redirect()->route('reportDetails', ['reportId' => $reportId, 'userId' => $user->userId, 'template' => 'metro']);
                    }
                    /*
                    $reportNotesRec = ReportNotes::where([['userId',$user->userId],['reportId',$reportId]])->first();
                    $data['all_points'] = array (
                                            1 => $reportNotesRec->point_1,
                                            2 => $reportNotesRec->point_2,
                                            3 => $reportNotesRec->point_3,
                                        );
                    */

                    //return redirect('/account/profileview')->with('status','Saved!!');
                }
            }
        }
        return view('account.reportNotes',$data);
    }
    
    public function updateUserInfo(Request $request)
    {
        $check = ClientDetail::where('userId', $request->pk)->first();

        if(!is_null($check)){
            ClientDetail::where('userId', $request->pk)->update([$request->name => $request->value]);            
        }
        
        return response()->json(['success'=>'done']);
    }

    public function updateUserPhotos(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = "vendors/".time().'.png';
        file_put_contents(public_path($imageName), $data);

        $clientDetail = ClientDetail::where('userId', $request->id)->first();
        if (!empty($clientDetail[$request->column]) && Storage::exists($clientDetail[$request->column])) {
            Storage::delete($clientDetail[$request->column]);
        }

        ClientDetail::where('userId', $request->id)->update([$request->column => $imageName]);

        return response()->json(['success'=>'done']);
    }

    public function flyersList(){
        $data['user']=Auth::User();
        //$data['sidebar']=view('account.accountSidebar',$data);
        //$data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));
        $data['flyers']=Auth::User()->flyers()->paginate(config('app.paginate'));
        return view('account.flyers',$data);
    }

    public function hdisList(){
        $data['user']=Auth::User();
        //$data['sidebar']=view('account.accountSidebar',$data);
        //$data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));
        $data['hdis']=Auth::User()->hdis()->paginate(config('app.paginate'));
        return view('account.hdis',$data);
    }
    public function referralsList(){
        $user=Auth::User();
        if (empty($user->referral_code)) {
            $referral_code = strtoupper($user->firstName);
            $referral_code = preg_replace('/\s+/', '', $referral_code);
            $userRecCount = User::where('referral_code', $referral_code)->count();
            if ($userRecCount == 0) {
                $user->referral_code = $referral_code;
                $user->save();
                //User::where('userId', $user->userId)->update(['referral_code'=>$referral_code]);
            } else {
                $i=1;
                do {
                    $userRecCount = User::where('referral_code', $referral_code.$i)->count();
                    if ($userRecCount == 0) {
                        $user->referral_code = $referral_code.$i;
                        $user->save();
                        break;
                    } else {
                        $i++;
                    }
                } while (true);
            }
        }
        $data['user']=$user=Auth::User();
        //$data['sidebar']=view('account.accountSidebar',$data);
        //$data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));
        $data['referrals']=Auth::User()->referrals()->paginate(config('app.paginate'));
        return view('account.referrals',$data);
    }

    public function creditsList(){
        $user=Auth::User();
        $data['user']=$user=Auth::User();
        //$data['sidebar']=view('account.accountSidebar',$data);
        //$data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));
        $data['credits']=Auth::User()->credits()->paginate(config('app.paginate'));
        return view('account.credits',$data);
    }


    public function referAColleague(){
        $user=Auth::User();
        if (empty($user->referral_code)) {
            $referral_code = strtoupper($user->firstName);
            $referral_code = preg_replace('/\s+/', '', $referral_code);
            $userRecCount = User::where('referral_code', $referral_code)->count();
            if ($userRecCount == 0) {
                $user->referral_code = $referral_code;
                $user->save();
                //User::where('userId', $user->userId)->update(['referral_code'=>$referral_code]);
            } else {
                $i=1;
                do {
                    $userRecCount = User::where('referral_code', $referral_code.$i)->count();
                    if ($userRecCount == 0) {
                        $user->referral_code = $referral_code.$i;
                        $user->save();
                        break;
                    } else {
                        $i++;
                    }
                } while (true);
            }
        }
        $data['user']=$user=Auth::User();
        //$data['sidebar']=view('account.accountSidebar',$data);
        //$data['transactions']=Auth::User()->transactions()->paginate(config('app.paginate'));
        //$data['referrals']=Auth::User()->referrals()->paginate(config('app.paginate'));
        return view('account.referAColleague',$data);

    }

    

}
