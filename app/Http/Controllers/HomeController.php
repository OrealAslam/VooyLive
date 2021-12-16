<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\City;
use App\Product;
use App\Category;
use App\Setting;
use App\User;
use App\Plan;
use App\FaqQuestionTitle;
use App\ClientDetail;
use App\UserReport;
use App\Testimonial;
use App\Video;
use App\ProfileColor;
use Carbon\Carbon;
use App\Jobs\ProcessEmails;
use Illuminate\Support\Facades\Storage;
use App\SmtpSetting;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingsData = Setting::pluck('value', 'slug')->all();
        view()->share('settingsData',$settingsData);

        $product = Product::where('is_home_page','1')->get()->take(4);
        return view('home',compact('product','settingsData'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        $data['user'] = Auth::User();
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        return view('account.dashboard',$data, compact('cityArray'));
    }

    public function profileview(Request $request){

        $data['profileColour'] = ProfileColor::get();
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function orderReport($name)
    {      
        if($name == 'communityFeatureSheet'){

            $cat = Category::orderBy('type','asc')->first();
            return view('orderRecipe',compact('name','cat'));
        }

        return redirect()->route($name);

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function communityFeatureSheet(){

        $data['user']=Auth::User();

        $data['hide_top_address_search'] = true;

        $cityArray = City::pluck('name','id')->all();
        
        $cityArray = json_encode($cityArray);
        
        $parentId = Auth::User()->parent_id;
        
        $data['userPlan'] = User::where('userId',$parentId)->first();
        $data['validateUser'] = getValidateUser();
        
        return view('account.communityFeatureSheet',$data, compact('cityArray'));
    }

    /**
     * Write code on Method
     *
    * @return response()
    */
     public function propertyFeatureSheet(){
        $data['user']=$user=Auth::User();
        $data['user_details']=$user_details=Auth::User()->ClientDetail;
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

        $data['validateUser'] = getValidateUser();

        $data['showMissingInfoModal'] = $showMissingInfoModal;

        return view('account.propertyFeatureSheet',$data, compact('cityArray'));
    }

    /**
     * Write code on Method
     *
     * @return response()
    */
    public function houseDetailsInfographic(){
        $data['user']=$user=Auth::User();
        $data['user_details']=$user_details=Auth::User()->ClientDetail;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        $showMissingInfoModal = false;
        $data['validateUser'] = getValidateUser();

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

    /**
    * Write code on Method
    *
    * @return response()
    */
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updateUserPhotos(Request $request)
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = "vendor/".time().'.png';
        \Log::info($imageName);
        file_put_contents(public_path($imageName), $data);

        $clientDetail = ClientDetail::where('userId', $request->id)->first();
        if (!empty($clientDetail[$request->column]) && Storage::exists($clientDetail[$request->column])) {
            Storage::delete($clientDetail[$request->column]);
        }

        ClientDetail::where('userId', $request->id)->update([$request->column => $imageName]);

     }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function purchasePlan()
    {   
        $plan = Plan::get();
        $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();
        return view('purchasePlan',compact('userCreateSubUser','plan'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createPlan()
    {
        $user = Auth::User();
        $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();
        return view('createPlan',compact('userCreateSubUser','user'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function processSubscribe(Request $request)
    {
        // grab the user
        $user = auth()->user();
        
        $ccToken = $request->input('cc_token');

        $plan = $request->input('plan');

        $planpurchase = 'planpurchase';

        try {
            $user = User::find($user->userId);

            $user->newSubscription('main', $plan)->trialDays(14)->create($ccToken, [
                'email' => $user->email
            ]);

            $user->plan = $plan;

            $user->save();

            $subscriptionObj = $user->subscription('main');
            $stripId = $subscriptionObj->stripe_id;
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $stripResponse = \Stripe\Subscription::retrieve($stripId);
            $subscriptionObj->renews_at = Carbon::createFromTimestamp($stripResponse->current_period_end);
            $subscriptionObj->save();

            $planObj = Plan::where('planId', $plan)->first();
            if($planObj->is_team){
                $user->update(['user_type' => 1]);                    
            }else{
                $user->update(['user_type' => NULL]);
            }

            $trialEndDate = \DB::table('subscriptions')->where('user_userId',$user->userId)->first();

            $datas = [
                'email' => $user->email,
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'plan' => $user->plan,
                'trialPeriodDays' => 14,
                'trialEndsAt' => $trialEndDate->trial_ends_at,
                'remainingDays' => 14,
            ];

            \Mail::send('emails.firstReminder', $datas, function($message) use ($datas) 
            {
                $message->to($datas['email']);
                $message->subject('Keep Calm And Carry On!');
            });
            
            \Mail::send('emails.firstReminder', $datas, function($message) use ($datas) 
            {
                $data  = SmtpSetting::first();
                $message->to($data->mail_admin_email);
                $message->subject('Keep Calm And Carry On!');
            });

        } catch (\Exception $e) {
            
            $planpurchase = 'planpurchase';

            $user = User::find($user->userId);

            $user->update(['stripe_id' => '']);

            $planObj = Plan::where('planId', $plan)->first();

            if($planObj->is_team){
                $user->update(['user_type' => 1]);                    
            }else{
                $user->update(['user_type' => NULL]);
            }

            $user->newSubscription('main', $plan)->trialDays(14)->create($ccToken, [
                'email' => $user->email
            ]);

            $subscriptionObj = $user->subscription('main');
            $stripId = $subscriptionObj->stripe_id;
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $stripResponse = \Stripe\Subscription::retrieve($stripId);
            $subscriptionObj->renews_at = Carbon::createFromTimestamp($stripResponse->current_period_end);
            $subscriptionObj->save();

            session()->put('planpurchase', $planpurchase);
            return redirect()->route('profileview')->with(['planpurchase'=>$planpurchase]);
            
            // return redirect('subscribe')->withErrors(['message' => 'Error creating subscription.'.$e->getMessage()]);
        }
        
        session()->put('planpurchase', $planpurchase);
        return redirect()->route('profileview')->with(['planpurchase'=>$planpurchase]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function faqs()
    {
        $faqQuestionTitles = FaqQuestionTitle::latest()->get();
        
        return view('faqs',compact('faqQuestionTitles'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function propertyFeatureSheetsDetail()
    {
        return view('propertyFeatureSheetsDetail');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function surveyDetail()
    {
        return view('surveyDetail');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function homeDetailsInfographicDetail()
    {
        return view('homeDetailsInfographicDetail');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function testimonials()
    {   
        $testimonial = Testimonial::get();
        return view('testimonials',compact('testimonial'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function video()
    {   
        $video = Video::get();
        return view('howToVideo',compact('video'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function invoices(){
        try {
            $user = $data['user'] = Auth::User();
            $data['invoices'] = $user->invoices();
        }catch(\Exception $e){
            $data['invoices'] = '';
        }
        return view('account.invoices',$data);
    }

    public function notFoundPage()
    {
        return view('notFound');
    }

    public function cancelSubscription(){
        $user=Auth::User();
        try {

            if ($user->user_type == 1) {
                $connectSubUser = User::where('parent_id',$user->userId)->get();

                foreach ($connectSubUser as $key => $value){
                    $value->update(['user_type' => null, 'parent_id'=> null]);    
                }

                $user->user_type = null;
                $user->save();
            }

            //$user->subscription('main')->resume();
            //$user->subscription('main')->cancelNow();
            $user->subscription('main', $user->planId)->cancel();

            // $user->plan = NULL;
            // $user->trial_ends_at = NULL;
            // $user->save();

            $data = array (
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'date' => date("Y-m-d H:i:s"),
                    'userEmail' => $user->email,
                    'type' =>'userCancel'
            );
            ProcessEmails::dispatch($data)->delay(Carbon::now())->onQueue('high');

            return back()->with('status','Subscription Cancelled Succcessfully');

        } catch (\Exception $e) {
            return back()->with('status','Request Cannot be completed at the moment');
        }
    }

    public function updateSubscription(Request $request){
        $user=Auth::User();
        try{
            if (empty($request->plan)) {
                return back();
            }
            $planObj = Plan::where('planId', $request->plan)->first();

            if($planObj->is_team){
                $user->update(['user_type' => 1]);                    
            }else{
                $user->update(['user_type' => NULL]);
            }
            
            $user->subscription('main')->swap($request->plan);
            $user->plan=$request->plan;
            $user->save();
            return back()->with('success','Subscription Changed');
        }
        catch(Exception $e){
            return redirect()->route('purchase.plan');
        }
        
    }

    public function notActiveUser()
    {
        return view('auth.notActiveUser');
    }

    public function survey()
    {
        return view('survey');
    }
}