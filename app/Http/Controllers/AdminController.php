<?php

namespace App\Http\Controllers;

use App\DiscountCode;
use App\Plan;
use App\User;
use App\SmtpSetting;
use Illuminate\Http\Request;
use Stripe\Card as StripeCard;
use Stripe\Token as StripeToken;
use Stripe\Plan as StripePlan;
use Illuminate\Support\Collection;
use Stripe\Charge as StripeCharge;
use Stripe\Refund as StripeRefund;
use Stripe\Invoice as StripeInvoice;
use Stripe\Customer as StripeCustomer;
use Stripe\BankAccount as StripeBankAccount;
use Stripe\InvoiceItem as StripeInvoiceItem;
use Stripe\Error\InvalidRequest as StripeErrorInvalidRequest;
use App\Order;
use App\Job;
use Carbon\Carbon;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Session;
use Illuminate\Support\Facades\DB;
use App\RegisterLinks;
use App\City;
use App\Flyer;
use App\Hdi;
use App\Icon;
use App\Tag;
use App\IconTag;
use Illuminate\Support\Facades\Storage;
use App\Credit;
use App\Category;
use App\Product;
use App\ProductGallery;
use App\ImageUpload;
use App\Transactions;
use App\ClientDetail;
use App\UserReport;
use App\UserProduct;
use App\UserProductDetail;
use App\Survey;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
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

    protected static $stripeKey;
    public static function getStripeKey()
    {
        if (static::$stripeKey) {
            return static::$stripeKey;
        }

        if ($key = getenv('STRIPE_SECRET')) {
            return $key;
        }

        return config('services.stripe.secret');
    }
     /**
     * Set the Stripe API key.
     *
     * @param  string  $key
     * @return void
     */
    public static function setStripeKey($key)
    {
        static::$stripeKey = $key;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerList(Request $request)
    {

        /*
        $data['cityArray']=$cityArray;

        return view('admin.customers', $data);
        */
        $data = [];
        $cityArray = City::pluck('name','id')->all();
            
        if ($request->ajax()) {
            //$customers = User::select();
            $customers = User::select()->where('role', 'client');
            
            //return Datatables::of($customers)->make(true);
            return Datatables::of($customers)
                ->escapeColumns([])
                //->editColumn('id', 'ID: {{$id}}')
                //->editColumn('region', 'ID: {{$cityArray[$region]}}')
                ->addColumn('region', function($customer) use($cityArray){
                    if($customer->region != 0){
                        $city = '-';
                        if(isset($cityArray[$customer->region])){
                            $city = $cityArray[$customer->region];
                        }
                    }else{
                      $city = '-';
                    }
                    return $city;
                })
                ->addColumn('created', function($customer){
                    
                    if(!is_null($customer->created_at)){
                       $date = \Carbon\Carbon::parse($customer->created_at)->format('Y-m-d');
                    }else{
                        $date = '';
                    }

                    return $date;
                })
                ->editColumn('plan', function($customer){
                    $str = '';
                    if(!is_null($customer->plan) && $planDetail = \App\Plan::where('planId',$customer->plan)->first()) {
                        $str = $planDetail->name;
                    } else {
                        $str = 'N/A';
                    }
                    return $str;
                })

                ->addColumn('statusSurvey',function($customer){
                    
                    if($customer->is_allow_multiple_survey == 1){
                        $statusSurvey = '<input type="checkbox" name="status" data-on="Yes" data-off="No"  checked data-onstyle="success" class="change-status toggle" data-offstyle="danger" data-toggle="toggle" data-id="'.$customer->userId.'">';
                    }
                    else{
                        $statusSurvey = '<input type="checkbox" name="status" data-on="Yes" data-off="No" data-onstyle="success" class="change-status toggle" data-offstyle="danger" data-toggle="toggle" data-id="'.$customer->userId.'">';
                    }
                    
                    return $statusSurvey;    
                })


                ->addColumn('status', function($customer){
                    if ($customer->verified == 1 && !is_null($customer->subscription('main'))) {
                        if($customer->subscribed('main')) {
                            if($customer->subscription('main')->onGracePeriod()) {
                                return '<p class="bg-danger text-center">Grace Period</p>';
                            } else {
                                return '<p class="bg-success text-center">Active</p>';
                            }
                        }else{
                            if (!empty($customer->subscription('main'))){
                                if($customer->verified == 1 && !is_null($customer->subscription('main')->cancelled()) && $customer->subscription('main')->cancelled()) {
                                    return '<p class="bg-danger text-center">Canceled</p>';
                                } else {
                                    return 'N/A';
                                }
                            }else{
                                return '<p class="bg-success text-center">Active</p>';
                            }
                        }
                    } elseif($customer->verified == 1){
                        return '<p class="bg-success text-center">Active</p>';
                    }else{
                        return '<p class="bg-info text-center">Not Verified</p>';
                    }
                })
                ->addColumn('type', function($customer){
                    $str = '';
                    if ($customer->verified == 1 && !is_null($customer->subscription('main'))) {
                        if ($customer->subscribed('main')) {
                            if ($customer->subscription('main')->onTrial()) {
                                $str = 'Trial';
                            } else {
                                $str = 'Paid';
                            }
                        } else {
                            $str = 'N/A';
                        }
                    } else {
                        $str = 'N/A';
                    }
                    return $str;
                })
                ->addColumn('activate', function($customer){
                    $str = '';
                    if ($customer->verified == 1 && !is_null($customer->subscription('main'))) {
                        if ($customer->subscribed('main')) {
                            if ($customer->subscription('main')->onTrial()) {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->created_at)->format('Y-m-d');
                            } else {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->created_at)->format('Y-m-d');
                            }
                        } else {
                            $str = 'N/A';
                        }
                    } else {
                        $str = 'N/A';
                    }
                    return $str;
                })
                ->addColumn('renew_at', function($customer){
                    $str = '';
                    if ($customer->verified == 1 && !is_null($customer->subscription('main'))) {
                        if ($customer->subscribed('main')) {
                            if ($customer->subscription('main')->onTrial()) {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->renews_at)->format('Y-m-d');
                            } else {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->renews_at)->format('Y-m-d');
                            }
                        } else {
                            $str = 'N/A';
                        }
                    } else {
                        $str = 'N/A';
                    }
                    return $str;
                })
                ->addColumn('expired', function($customer){
                    $str = '';
                    if ($customer->verified == 1 && !is_null($customer->subscription('main'))) {
                        if ($customer->subscribed('main')) {
                            if ($customer->subscription('main')->onTrial()) {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->trial_ends_at)->format('Y-m-d');
                            } else {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->ends_at)->format('Y-m-d');
                            }
                        } else {
                            if (!empty($customer->ends_at)) {
                                $str = \Carbon\Carbon::parse($customer->subscription('main')->ends_at)->format('Y-m-d');
                            }
                        }
                    } else {
                        $str = 'N/A';
                    }
                    return $str;
                })
                ->addColumn('action', function ($customer) {
                    $str = '';
                    $str .= '<form action="'.url('admin/customers/'.$customer->userId).'" method="POST">';
                    $str .= '<input type="hidden" name="_method" value="DELETE">';
                    $str .= csrf_field();
                    $str .= '<a href="'.action('AdminController@editCustomer',$customer->userId).'" class="btn btn-primary btn-xs"><li class="fa fa-edit"></li></a>';
                    $str .= '<a href="'.action('AdminController@updateCustomerPlan',$customer->userId).'" class="btn btn-info btn-xs"><li class="fa fa-pencil"></li></a>';
                    $str .= '<button class="btn btn-danger btn-xs remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $str .= '<a href="'.action('AdminController@customerDetail',$customer->userId).'" class="btn btn-success btn-xs">View</a>';
                    if(!empty($customer->verified == 1)) {
                        $str .= '<a href="'.route('userLoginAs',['userId' => $customer->userId]).'" class="btn btn-success btn-xs">Login As</a>';
                    } else {
                        $str .= '<a target="_blank" href="'.route('active.account', ['token' => $customer->email_token]).'" class="btn btn-info btn-xs">Verify Email</a>';
                    }
                    $str .= '</form>';
                    return $str;
                })
                //->editColumn('id', 'ID: {{$id}}')
                //->removeColumn('password')
                ->make(true);
        }
        return view('admin.customers', $data);
    }
    public function oldCustomerList(Request $request)
    {
        $data = [];
        $cityArray = City::pluck('name','id')->all();
        $data['cityArray']=$cityArray;

        return view('admin.customers_old', $data);
    }

    public function plans()
    {

        return view('admin.plan.plans');
    }

    public function editPlan($id)
    {

        $plan =Plan::findorfail($id);

        return view('admin.plan.editPlan',compact('plan'));
    }

    public function deletePlan($id)
    {

        Plan::findorfail($id)->delete();
        return back()->with('status','Plan is deleted Successfully!');
    }

    public function updatePlan( Request $request,$id)
    {

      try{
            $response=StripePlan::retrieve($request->name, ['api_key' => $this->getStripeKey()]);
            $plan =Plan::findorfail($id);
            $plan->planId=$response->id;
            $plan->name=$response->name;
            $plan->trial_period_days=$response->trial_period_days;
            $plan->interval=$response->interval;
            $plan->amount=$response->amount;
            $plan->status=$request->status;
            $plan->save();
            return back()->with('status','Plan Updated Successfully!');
        }
        catch(StripeErrorInvalidRequest $e){
            return back()->with('status',$e->getMessage());
        }
        
    }

    public function addPlan()
    {


        return view('admin.plan.addPlan');
    }

    public function addNewPlan(Request $request)
    {
        try{
            $response=StripePlan::retrieve($request->name, ['api_key' => $this->getStripeKey()]);
            $plan=[
                'planId'=>$response->id,
                'name'=>$response->name,
                'trial_period_days'=>$response->trial_period_days,
                'interval'=>$response->interval,
                'amount'=>$response->amount,
                'status'=>$request->status
            ];

            Plan::create($plan);
            return back()->with('status','New Plan is Added Successfully!');
        }
        catch(StripeErrorInvalidRequest $e){
            return back()->with('status',$e->getMessage());
        }
        


    }

    public function cfsSales()
    {
        $data['transactions']=Order::paginate(config('app.paginate'));

        return view('admin.sale.cfsSales',$data);
    }
    public function weekly()
    {
        $data['transactions']=Order::where('created_at','>',Carbon::now()->subDays(7)->toDateTimeString())->paginate(config('app.paginate'));

        return view('admin.sale.weekly',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardShow()
    {
        return view('admin.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function discounts()
    {

        return view('admin.discount.discounts');

    }

    public function addDiscount()
    {
        return view('admin.discount.addDiscount');

    }

    public function addNewDiscount(Request $request)
    {
        DiscountCode::create($request->all());
        return back()->with('status','Discount Code is Added Successfully!');
    }

    public function editDiscount($id)
    {
        $discount =DiscountCode::findorfail($id);
        return view('admin.discount.editDiscount',compact('discount'));
    }

    public function deleteDiscount($id)
    {
      DiscountCode::findorfail($id)->delete();

        return back()->with('status','Discount Code is Deleted Successfully!');
    }

    public function updateDiscount(Request $request)
    {
        $discount =DiscountCode::findorfail($request->id);
        $discount->update($request->all());

        return back()->with('status','Discount Code is Updated Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCustomer($id)
    {
        $customerData = User::findorfail($id);
        return view('admin.editCustomer',compact('customerData'));
    }

    public function updateCustomer(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
                'id' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'region' => 'required',
                'email' => 'required|email',
                'password' => 'same:password_confirmation',
            ]);

        if ($validator->passes()) {
            if(!empty($input['password'])){
                $input['password'] = bcrypt($input['password']);
            }
            $input = array_except($input,["_token","id","password_confirmation"]);
            User::where("userId",$request->id)->update($input);

            Session::flash('success_msg', 'Record Updated successfuly');
            return back();


            //return redirect('admin/customers');
        }
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }
    
    public function customerDelete($id){
        $customer = User::findorfail($id);
        $details = $customer->ClientDetail;

        $filename=$details->photo;
        if($filename!=null)
            Storage::delete($filename);
        $filename=$details->logo;
        if($filename!=null)
            Storage::delete($filename);

        $customer->ClientDetail->delete();
        $customer->delete();

        return redirect()->to('admin/customers');
    }

    public function customerDetail($id)
    {
        $customer =User::findorfail($id);

        return view('admin.customerDetail',compact('customer'));
    }


    public function updateCustomerPlan(Request $request, $id)
    {
        $data = array();
        $data['user'] = $user = User::findorfail($id);


        if ($request->isMethod('post')) {
            $rules = array(
                'new_plan' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                try{
                    $user->subscription('main')->swap($request->new_plan);
                    $user->plan=$request->new_plan;
                    $user->save();
                    Session::flash('success_msg', 'Subscription Changed');
                    return back();
                }
                catch(Exception $e){
                    Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                    return back();
                }
            }
        }
        return view('admin.customerPlan',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adminUpdateProfileUserNameEmail(Request $request)
    {
        $user = Auth::User();

        $rules = array(
            'newEmail' => 'unique:users,email,$user->userId,userId'
        );  

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            if($request->newEmail == ''){
                $email = $request->email;    
            }else{
                $email = $request->newEmail;
            }
            $user->update([
                'email' => $email,
                'firstName' => $request->first_name,
                'lastName' => $request->last_name
            ]);
            Session::flash('success_msg', 'User Name And Email Updated Successfully');
            return Redirect::back();
        }
        
    }

    public function adminUpdateProfile(Request $request)
    {
        $user = Auth::User();

        //$discount =DiscountCode::findorfail($id);
        if ($request->isMethod('post')) {

            $rules = array(
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'repassword'  => 'required',
            );

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                if(!Hash::check($request->oldpassword, $user->password)){
                        return Redirect::back()
                        ->withErrors('old password does not match the database password');
                } elseif ($request->newpassword !==  $request->repassword) {
                    return Redirect::back()
                        ->withErrors(array('Password Did Not Match'));
                } else {
                    $user->password = Hash::make($request->newpassword);
                    if ($user->save()){
                        Session::flash('success_msg', 'Password Updated Successfully');
                    } else {
                        Session::flash('error_msg', 'Unable to Update Password');
                    }
                }
            }
        }
        return view('admin.changePassword');
    }

    public function viewEmailJobs(Request $request){
        $data['user']=Auth::User();
        /*
        $records=Auth::User()->UserReport;
        $data['records']=$records;
        */
        //$data['records'] = DB::table('user_reports')->paginate(2);
        $data['total_records'] = DB::table('jobs')->count();
        $data['records'] = DB::table('jobs')->paginate(10);
        //$data['sidebar']=view('account.accountSidebar',$data);

        return view('admin.viewEmailJobs',$data);
    }

    public function viewFailEmailJobs(Request $request){
        $data['user']=Auth::User();
        /*
        $records=Auth::User()->UserReport;
        $data['records']=$records;
        */
        //$data['records'] = DB::table('user_reports')->paginate(2);
        $data['total_records'] = DB::table('failed_jobs')->count();
        $data['records'] = DB::table('failed_jobs')->paginate(10);
        //$data['sidebar']=view('account.accountSidebar',$data);

        return view('admin.viewFailEmailJobs',$data);
    }

    public function registerLinks(Request $request){
        $data['user']=Auth::User();

        if ($request->isMethod('post')) {
            $rules = array(
                'plan' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                $data=[
                    'link'=>base64_encode($request->input('plan').time()),
                    'status'=>'not-used',
                    'plan_id'=>$request->input('plan')
                ];
                RegisterLinks::create($data);
                return back()->with('success_msg','New Link is created');
            }
        }


        $data['total_records'] = DB::table('register_links')->count();
        $data['records'] = DB::table('register_links')->paginate(10);
        $allPlans = Plan::all();
        foreach ($allPlans as $plan) {
            $data['allPlans'][$plan->planId] = $plan->name;
        }
        return view('admin.registerLinks',$data);

    }


    public function pfsSales()
    {
        $data['flyers']=Flyer::paginate(config('app.paginate'));

        return view('admin.sale.pfsSales',$data);
    }

    public function hdiSales()
    {
        $data['hdis']=Hdi::paginate(config('app.paginate'));

        return view('admin.sale.hdiSales',$data);
    }

    public function icons(Request $request)
    {
        $data['icons']=Icon::paginate(config('app.paginate'));

        if ($request->isMethod('post')) {
            $mTag = new Tag();
            $result = $mTag->getTags($request->input('q'), $request->input('limit'));
            if ($result) {
                return json_encode($result);
            } else {
                return json_encode(['status'=> false]);
            }
        }


        return view('admin.icons',$data);
    }

    public function upsertIcons(Request $request, $id = false)
    {
        $data = array();
        $user = $data['user'] = Auth::User();
        $newIconTags = array();
        $iconTags = array();

        $rules = array(
            'name' => 'required',
            'icon_file' => 'image|max:1000|mimes:svg',
        );


        if ($id) {
            $data['id'] = $id;
            $iconData = Icon::findorfail($id);

            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    if ($request->input('tags')) {
                        $newIconTags = $request->input('tags');
                        $request->request->remove('tags');
                    }

                    if ($request->file('icon_file')) {
                        if (!empty($iconData->icon_file) && Storage::exists('/hdi_icons/'.$iconData->icon_file)) {
                            Storage::delete('/hdi_icons/'.$iconData->icon_file);
                        }

                        $image = $request->file('icon_file');
                        $icon_file = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/hdi_icons');
                        $image->move($destinationPath, $icon_file);

                        $iconData->icon_file = $icon_file;
                    }

                    $iconData->name = $request->input('name');
                    $iconId = $iconData->save();

                    try {
                        $response = $this->upsertIconTags($iconData->id, $newIconTags, 'edit');
                    } catch(Exception $e){
                        return back()->with('error_msg','Request Cannot Be Completed at the moment');
                        //Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                        return back();
                    }
                    return back()->with('success_msg','Icon is updated');
                }
            }


        } else {

            $iconData = array();

            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
                } else {

                    if ($request->input('tags')) {
                        $newIconTags = $request->input('tags');
                        $request->request->remove('tags');
                    }

                    if ($request->file('icon_file')) {
                        $image = $request->file('icon_file');
                        $icon_file = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/hdi_icons');
                        $image->move($destinationPath, $icon_file);

                        $iconData['icon_file'] = $icon_file;
                    }

                    $iconData['name'] = $request->input('name');
                    $iconRec = $user->icons()->create($iconData);

                    try {
                        $response = $this->upsertIconTags($iconRec->id, $newIconTags, 'new');
                    } catch(Exception $e){
                        return back()->with('error_msg','Request Cannot Be Completed at the moment');
                        //Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                        return back();
                    }


                    return back()->with('success_msg','New Icon is created');
                }
            }
        }

        /*
        $data['icons']=Icon::paginate(config('app.paginate'));
        */
        //$iconData = Icon::findorfail($id);

        return view('admin.upsertIcons',compact('iconData', 'data'));
    }

    public function upsertIconTags($iconId, $newTags, $mode = false)
    {
        if ($mode && $mode == 'edit') {
            //check if tags already associated to this icon then delete them
            $deletedIconTagRows = IconTag::where('icon_id', $iconId)->delete();
        }

        //add tags to icon
        //echo '<pre>';
        //print_r($newTags);

        if (count($newTags) > 0) {
            foreach ($newTags as $key => $val) {
                //echo '<hr>';
                //echo $val.'<br>';
                $tagRowCount = Tag::where('id', $val)->count();
                //echo $tagRowCount.'<br>';
                if ($tagRowCount > 0) {
                    //echo 'if<br>';
                    $miconTag = new IconTag;
                    $miconTag->icon_id = $iconId;
                    $miconTag->tag_id = $val;
                    $miconTag->save();
                } else {
                    //echo 'else<else>';
                    $tagRowCount = Tag::where(DB::raw('lower(name)'), strtolower($val))->count();
                    if ($tagRowCount > 0) {
                        $tagRec = Tag::where(DB::raw('lower(name)'), strtolower($val))->get();

                        $miconTag = new IconTag;
                        $miconTag->icon_id = $iconId;
                        $miconTag->tag_id = $tagRec->id;
                        $miconTag->save();
                    } else {
                        $mTag = new Tag;
                        $mTag->name = $val;
                        $mTag->save();

                        $miconTag = new IconTag;
                        $miconTag->icon_id = $iconId;
                        $miconTag->tag_id = $mTag->id;
                        $miconTag->save();
                    }
                }
            }
        }
    }

    public function tags(Request $request)
    {
        $data['tags']=Tag::paginate(config('app.paginate'));

        return view('admin.tags',$data);
    }

    public function upsertTags(Request $request, $id = false)
    {
        $data = array();
        $user = $data['user'] = Auth::User();

        $rules = array(
            'name' => 'required',
        );


        if ($id) {
            $data['id'] = $id;
            $tagData = Tag::findorfail($id);

            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
                } else {

                    

                    try {
                        $tagData->name = $request->input('name');
                        $tagId = $tagData->save();
                    } catch(Exception $e){
                        return back()->with('error_msg','Request Cannot Be Completed at the moment');
                        //Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                        return back();
                    }
                    return back()->with('success_msg','Tag is updated');
                }
            }


        } else {

            $tagData = array();

            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    try {
                        $mTag = new Tag;
                        $mTag->name = $request->input('name');
                        $tagRec = $mTag->save();
                    } catch(Exception $e){
                        return back()->with('error_msg','Request Cannot Be Completed at the moment');
                        //Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                        return back();
                    }


                    return back()->with('success_msg','New Tag is created');
                }
            }
        }

        /*
        $data['icons']=Icon::paginate(config('app.paginate'));
        */
        //$iconData = Icon::findorfail($id);

        return view('admin.upsertTags',compact('tagData', 'data'));
    }



    public function reportAddressUpdate(Request $request, $reportId, $userId)
    {
        $default_report_address = '';
        if ($request->isMethod('post')) {
            //get order for report id and user id
            $order=Order::where([['userId',$userId],['reportId',$reportId]])->count();
            if ($order==0) {
                return (array('status'=>0, 'msg'=>'Report does not belong to that user'));
            } else {
                if (Order::where([['userId',$userId],['reportId',$reportId]])->update([$request->input('hdi_field_id') => $request->input('hdi_field_value')])) {
                    if ($request->input('hdi_field_value') == '') {
                        $orderRec = Order::where([['userId',$userId],['reportId',$reportId]])->first();
                        $default_report_address = $orderRec->report->address;
                    }
                    return (array('status'=>1, 'msg'=>'Report Address updated successfuly', 'default_report_address' => $default_report_address));
                } else {
                    return (array('status'=>0, 'msg'=>'unable to update current order report'));
                }
            }
        } else {
            abort(404);
        }
    }

    public function userCredits(Request $request)
    {
        $cityArray = City::pluck('name','id')->all();
        $data['cityArray']=$cityArray;

        return view('admin.userCredits',$data);
    }
    public function userCreditsDetail(Request $request, $userId)
    {
        $user = User::findorfail($userId);
        $data['credits']=$user->credits()->paginate(config('app.paginate'));
        return view('admin.userCreditsDetail',$data);
    }

    public function userCreditsUpsert(Request $request, $userId)
    {
        $user = User::findorfail($userId);
        //$data['credits']=$user->credits()->paginate(config('app.paginate'));

        $data = array();
        $data['user'] = $user;

        $rules = array(
            'credit' => 'required',
            'descr' => 'max:255',
        );

        $tagData = array();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                try {
                    $mCredit=new Credit();
                    $mCredit->descr = !empty($request->input('descr')) ? $request->input('descr') : 'Admin Added/Removed';
                    $mCredit->user_id = $user->userId;
                    $mCredit->type = 'admin';
                    $mCredit->credit = $request->input('credit');
                    $creditRec = $mCredit->save();
                } catch(Exception $e){
                    return back()->with('error_msg','Request Cannot Be Completed at the moment');
                    //Session::flash('error_msg', 'Request Cannot Be Completed at the moment');
                    return back();
                }

                return back()->with('success_msg','Credits Added to the user');
            }
        }
        return view('admin.userCreditsUpsert',$data);
    }

    public function userLoginAs(Request $request, $userId)
    {
        $loggedInUser = Auth::User();
        try {
            $user = User::findorfail($userId);

            Session::put('is_admin_logged_in', 1);
            Session::put('admin_id', Auth::id());

            Auth::login($user);
            //Auth::guard('admin')->login($user);

            return redirect()->route('dashboard');

            /*
            // read current auth object
            $auth = $authentication->getStorage()->read();
            // save current auth object in session
            $sessionContainer->authadmin = $auth;
            // clear the current auth object
            $authentication->getStorage()->clear();
            // write the user object in auth object
            $authentication->getStorage()->write($data);
            // redirect to user dashboard
            return $this->redirect()->toRoute('dashboard');

            die();
            */



        } catch(Exception $e){
            return redirect()->to('admin/customers');
        }
        die();
    }

    /**
     * Category List.
     *
     * @param  string  $key
     * @return void
     */
    public function purchesProductsList(Request $request){

        if ($request->ajax()) {
            
            $product = UserProduct::latest();
            
            return Datatables::of($product)

                ->addIndexColumn()

                ->addColumn('type', function($product){
                    if ($product->product_type == 1) {
                        $type = '<span class="label label-primary">Product</span>';
                    }else {
                        $type = '<span class="label label-success">Credit</span>';
                    }
                    return $type;
                })

                ->addColumn('amount', function($product){
                    return '$'.$product->amount;
                })

                ->addColumn('product', function($product){
                    if(!empty($product->product['name'])){
                        return $product->product['name'];
                    }else{
                        return '-';
                    }
                })

                ->addColumn('userName', function($product){
                    if(!empty($product->user['firstName']) && ($product->user['lastName'])){
                        return $product->user['firstName'].' '.$product->user['lastName'];
                    }else{
                        return '-';
                    }
                })

                ->addColumn('created_at', function($product){
                    
                    if(!is_null($product->created_at)){
                       $date = \Carbon\Carbon::parse($product->created_at)->format('Y-m-d');
                    }else{
                        $date = '';
                    }

                    return $date;
                })

                ->addColumn('action', function($product){
                    $btn = '';
                    $userProductDetail = UserProductDetail::where('user_product_id',$product->id)->count();
                    if($product->product_type == 1){
                        $btn = ' <a href="'. route('user.product.detail.index',[$product->id]) .'" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" data-placement="top" title="Response" style="margin-top:5px;display-inline:block;">Response</a>';
                        $btn .=  '<button class="btn btn-danger delete-pro btn-sm btn-flat" style="margin-top: 7px;" data-id="'.$product->id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                    }

                    if ($userProductDetail >= 1) {
                        $btn .=  '<label class="label label-success">Delivered</label>';
                    }else{
                        $btn .=  '<label class="label label-primary">New</label>';
                    }


                    return $btn;
                })
                
                ->rawColumns(['action','type','amount','userName','created_at'])    

                ->make(true);
        }

        return view('admin.eCommerce.purchesProduct.index');
    }

    public function purchesProductsDelete(Request $request)
    {
        $product = UserProduct::find($request->product_id);
        $paymentHistory = $product->paymentHistory;
        $debit = $paymentHistory->userDebits;

        if ($product->amount == $debit->debit && $product->amount == $paymentHistory->amount) {
            $debit->update(['debit' => 0]);
            $paymentHistory->update(['amount' => 0, 'total_amount' => 0, 'credit_detail' => null, 'products' => null]);
        }else{
            $gstPrice = $product->amount + ($product->amount * getSettingValue('home-product-gst') / 100);
            $effectedAmount = $paymentHistory->amount - $gstPrice;
            $debit->update(['debit' => $effectedAmount]);
            $paymentHistory->update(['amount' => $effectedAmount, 'total_amount' => $effectedAmount, 'credit_detail' => null, 'products' => null]);
        }

        $product->delete();

        Session::flash('success_msg', 'Product Delete Successfuly');
        return response()->json(['success'=>'done']);
    }

    public function index(Request $request, $id)
    {   
        if ($request->ajax()) {
            $data = UserProductDetail::where('user_product_id',$id)->get();
            return Datatables::of($data)

                ->rawColumns(['action'])
                ->make(true);
        }

        $userProduct = UserProduct::where('id',$id)->pluck('name','id')->first();
        return view('admin.eCommerce.userPurchesProduct.index',compact('id','userProduct'));
    }

    /**
     * Category List.
     *
     * @param  string  $key
     * @return void
     */
    public function categorysList(Request $request)
    {
        if ($request->ajax()) {
            
            $category = Category::latest()->get();
            
            return Datatables::of($category)

                ->addIndexColumn()

                ->addColumn('type', function($category){
                        if ($category->type == 0) {
                            $type = '<span class="label label-primary">Product</span>';
                        }else {
                            $type = '<span class="label label-success">Credit</span>';
                        }
                        return $type;
                })
                
                ->addColumn('action', function($category){
                    $str = '';
                    $str .= ' <a class="btn btn-flat btn-sm btn-info" href="'. route('category.show',$category->id) .'" data-toggle="tooltip" data-placement="top" title="Show" style=""> <i class="fa fa-eye"></i></a>';
                    $str .= ' <a href="'. route('category.edit',[$category->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit" style=""><i class="fa fa-pencil"></i></a>';
                    $str .= '<form action="'.url('admin/category/delete/'.$category->id).'" method="POST" style="display:contents">';
                    $str .= '<input type="hidden" name="_method" value="DELETE">';
                    $str .= csrf_field();
                    $str .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $str .= '</form>';
                    return $str;
                })
                
                ->rawColumns(['action','type'])    

                ->make(true);
        }
        return view('admin.eCommerce.category.index');
    }

    /**
     * Category Create.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryCreate()
    {
        return view('admin.eCommerce.category.create');   
    }

    /**
     * Category Store.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryStore(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'title' => 'required',
        ], 
        [
            'title.required' => 'The Category Name field is required',
        ]);

        if ($validator->passes()){

            $input['slug'] = str_slug($input['title']);

            Category::create($input);

            Session::flash('success_msg', 'Category Create Successfuly');
            return redirect(route('categorys'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Category Edit.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryEdit($id)
    {
        $data = Category::where('id',$id)->first();
        return view('admin.eCommerce.category.edit',compact('data'));   
    }

    /**
     * Category Update.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryUpdate(Request $request,$id)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'title' => 'required',
        ], 
        [
            'title.required' => 'The Category Name field is required',
        ]);
        
        if ($validator->passes()){

            $input['slug'] = str_slug($input['title']);

            $input = array_except($input,["_token","id"]);
            Category::where("id",$request->id)->update($input);

            Session::flash('success_msg', 'Category Update Successfuly');
            return redirect(route('categorys'));        
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Category Show.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryShow($id)
    {
        $data = Category::where('id',$id)->first();
        return view('admin.eCommerce.category.show',compact('data'));   
    }

    /**
     * Category Delete.
     *
     * @param  string  $key
     * @return void
     */
    public function categoryDelete($id)
    {
        Category::find($id)->delete();
        Session::flash('success_msg', 'Category Delete Successfuly');
        return redirect(route('categorys'));
    }

    /**
     * Product List.
     *
     * @param  string  $key
     * @return void
     */
    public function productsList(Request $request)
    {
        if ($request->ajax()) {
            
            $product = Product::latest()->get();

            return Datatables::of($product)

                ->addIndexColumn()
                
                ->addColumn('image', function($product){
                    return  $image = '<img src="'.asset('upload/product/'.$product->image.'').'" height="100" width="100">';
                })
                
                ->addColumn('description', function($product){
                    return $product->description;
                })

                ->addColumn('is_home_page', function($product){
                    if(!is_null($product->categoryName) && $product->cat_id != 1  && $product->categoryName->type == 1){
                        $is_home_page = '-';
                    }else{
                        if ($product->is_home_page == 0) {
                            $is_home_page = '<span class="label label-danger">No</span>';
                        }else {
                            $is_home_page = '<span class="label label-success">Yes</span>';
                        }
                    }
                    return $is_home_page;
                })

                ->addColumn('action', function($product){
                    $str = '';
                    $str .= ' <a class="btn btn-flat btn-sm btn-info" href="'. route('product.show',$product->id) .'" data-toggle="tooltip" data-placement="top" title="Show"> <i class="fa fa-eye"></i></a>';
                    $str .= ' <a href="'. route('product.edit',[$product->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>';
                    $str .= '<form action="'.url('admin/product/delete/'.$product->id).'" method="POST" style="display:contents">';
                    $str .= '<input type="hidden" name="_method" value="DELETE">';
                    $str .= csrf_field();
                    $str .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $str .= '</form>';
                    if(!is_null($product->categoryName) && $product->cat_id != 0  && $product->categoryName->type == 0){
                        $str .= ' <a href="'. route('product.gallery.index',[$product->id]) .'" class="btn btn-primary btn-xs btn-flat" data-toggle="tooltip" data-placement="top" title="Edit" style="margin-top:5px;display-inline:block;">Manage Product Gallery</a>';
                    }
                    return $str;
                })

                ->rawColumns(['action','image','description','is_home_page'])

                ->make(true);
        }
        return view('admin.eCommerce.product.index');
    }

    /**
     * Product Create.
     *
     * @param  string  $key
     * @return void
     */
    public function productCreate()
    {
        $categoryName = Category::get();
        return view('admin.eCommerce.product.create',compact('categoryName'));   
    }

    /**
     * Category Store.
     *
     * @param  string  $key
     * @return void
     */
    public function productStore(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'product_code' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()){

            if($request->hasFile('image')){
                $input['image'] = ImageUpload::upload('/upload/product',$request->file('image'));
            }

            $input['is_home_page'] = isset($input['is_home_page']) ? 1 : 0;
            $input['availability'] = isset($input['availability']) ? 0 : 1;
            $input['address'] = isset($input['address']) ? 0 : 1;
            $input['upload_image'] = isset($input['upload_image']) ? 0 : 1;
            $input['neighborhood'] = isset($input['neighborhood']) ? 0 : 1;
            $input['rush_delivery'] = isset($input['rush_delivery']) ? 0 : 1;
            $input['custom_charge'] = isset($input['custom_charge']) ? 0 : 1;

            Product::create($input);

            Session::flash('success_msg', 'Product Create Successfuly');
            return redirect(route('products'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Product Edit.
     *
     * @param  string  $key
     * @return void
     */
    public function productEdit($id)
    {
        $data = Product::where('id',$id)->first();
        $categoryName = Category::get();
        return view('admin.eCommerce.product.edit',compact('categoryName','data'));   
    }

    /**
     * Product Update.
     *
     * @param  string  $key
     * @return void
     */
    public function productUpdate(Request $request,$id)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name' => 'required',
            'price' => 'required|numeric',
            'product_code' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()){

            if($request->hasFile('image')){
                $input['image'] = ImageUpload::upload('/upload/product/',$request->file('image'));
            }else{
                unset($input['image']);
            }

            $input['is_home_page'] = isset($input['is_home_page']) ? 1 : 0;
            $input['availability'] = isset($input['availability']) ? 0 : 1;
            $input['address'] = isset($input['address']) ? 0 : 1;
            $input['upload_image'] = isset($input['upload_image']) ? 0 : 1;
            $input['neighborhood'] = isset($input['neighborhood']) ? 0 : 1;
            $input['rush_delivery'] = isset($input['rush_delivery']) ? 0 : 1;
            $input['custom_charge'] = isset($input['custom_charge']) ? 0 : 1;

            $input = array_except($input,["_token","id"]);
            Product::where("id",$request->id)->update($input);

            Session::flash('success_msg', 'Product Update Successfuly');
            return redirect(route('products'));    
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Product Show.
     *
     * @param  string  $key
     * @return void
     */
    public function productShow($id)
    {
        $data = Product::where('id',$id)->first();
        $categoryName = Category::pluck('title','id');
        return view('admin.eCommerce.product.show',compact('categoryName','data'));   
    }

    /**
     * Product Delete.
     *
     * @param  string  $key
     * @return void
     */
    public function productDelete($id)
    {
        Product::find($id)->delete();
        Session::flash('success_msg', 'Product Delete Successfuly');
        return redirect(route('products'));
    }

    public function productGalleryindex(Request $request, $id)
    {
        $productGalleryImage = ProductGallery::where('pro_id',$id)->get();        
        return view('admin.eCommerce.product.productGallery.index',compact('id','productGalleryImage'));
    }

    /**
     * Image Upload Code
     *
     * @return void
     */
    public function productGalleryStore(Request $request)
    {   
        $input = $request->all();

        $productGallery = ProductGallery::where('pro_id',$input['product_id'])->first();        

        $file = $request->file('file');
        $image = ImageUpload::upload('upload/product/productGallery',$request->file('file'));

        if (!is_null($productGallery)) {
            $images = [];
            $images[] = $productGallery->image;
            $images[] = $image;
            $productGallery->update(['image'=>implode(',', $images)]);
        }else{
            $data = [];
            $data['pro_id'] = $request->product_id;
            $data['image'] = $image;
            ProductGallery::create($data);
        }


        return response()->json(['success'=>'done']);
    }

    public function productGalleryDelete(Request $request)
    {
        $productGallery = ProductGallery::where('pro_id',$request->id)->first();

        $image = [];

        $image[] = $request->name;

        $images = explode(',', $productGallery->image);

        $t = array_diff($images,$image);

        if($productGallery->image == ''){
           ProductGallery::where('id',$productGallery->id)->delete();
        }

        $productGallery->update(['image'=>implode(',', $t)]);
    }

    public function productGalleryImage(Request $request)
    {
        $productGallery = ProductGallery::where('pro_id',$request->id)->first();
        
        $images = explode(',', $productGallery->image);

        $data = [];
        foreach ($images as $key => $value) {
            $data[$key]['name'] = $value;
            $data[$key]['path'] = asset('upload/product/productGallery/'.$value);
        }

        return response()->json(['data'=>$data]);
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
        }else{
            return redirect()->route('dashboard');
        }
        $data['user']=Auth::User();
        //$data['hide_top_address_search'] = false;
        $cityArray = City::pluck('name','id')->all();
        $cityArray = json_encode($cityArray);
        return view('account.dashboard',$data, compact('cityArray'));
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

    public function survey(Request $request)
    {
        $data = Survey::latest()->get();

        if ($request->ajax()) {
            return Datatables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function($data){

                    $btn = '';
                    $btn .= ' <a href="'. route('user.survey.show',[$data->id]) .'" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-eye"></i></a>';
                    $btn .= ' <a href="'. route('user.survey.edit.created.date',[$data->id]) .'" class="btn btn-warning btn-sm btn-flat" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="fa fa-pencil"></i> Edit Creation Date</a>';
                    $btn .= '<form action="'.route('user.survey.delete',[$data->id]) .'" method="POST" style="display:contents">';
                    $btn .= '<input type="hidden" name="_method" value="DELETE">';
                    $btn .= csrf_field();
                    $btn .= '<button class="btn btn-danger btn-sm remove-customer" type="submit"><span class="fa fa-remove"></span></button>';
                    $btn .= '</form>';

                    return $btn;
                })

                ->addColumn('created_at', function($contactUs){
                    return date('d-m-Y', strtotime($contactUs->created_at));
                })

                ->addColumn('name', function($data){
                    return $name = $data->userName->firstName .' '. $data->userName->lastName;
                })

                ->rawColumns(['action','name','created_at'])
                ->make(true);
        }

        return view('admin.survey.index');
    }

    public function surveyShow($id)
    {
        $dataJ = Survey::where('id',$id)->first();
        return view('admin.survey.show',compact('dataJ'));   
    }

    public function surveyEditCreatedDate($id)
    {
        $data = Survey::where('id',$id)->first();
        $date = \Carbon\Carbon::parse($data->created_at)->format('Y-m-d');
        return view('admin.survey.edit',compact('data','date'));   
    }

    public function surveyCreatedDateUpdate($id, Request $request)
    {
        $created_at = \Carbon\Carbon::parse($request->created_at)->format('Y-m-d H:i:s');
        $data = Survey::where('id',$id)->update(['created_at' => $created_at]);
        Session::flash('success_msg', 'Survey Creation Date Successfuly Changed');
        return redirect(route('surveyList'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function surveyDelete($id)
    {
        Survey::find($id)->delete();
        Session::flash('success_msg', 'Survey Delete Successfuly');
        return redirect(route('surveyList'));
    }

    /**
     * Ajax status update user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userChangeStatus(Request $request,User $user,$id)
    {
        $user = User::find($id);
        $user->update(['is_allow_multiple_survey' => $request->status]);
        return response()->json(['success'=>'Status Updated successfully.']); 
    }

    function  smtp_settings()
    {
        $data  = SmtpSetting::first();
        // $data = "";
        return view('admin.smtpsettings.index' , compact('data'));
    }
    function smtp_settings_store(Request $req)
    {
        $data  = SmtpSetting::first();
    
        if($data==null){
            SmtpSetting::create([
            'mail_driver' => $req->mail_driver,
            'mail_from_name' => $req->mail_from_name,
            'mail_admin_email' => $req->mail_admin_email,
            'mail_encryption' => $req->mail_encryption,
            'mail_from_address'  => $req->mail_from_address,
            'mail_password' => $req->mail_password,
            'mail_port' => $req->mail_port,
            'mail_username' => $req->mail_username,
            'mail_host' => $req->mail_host,
        ]);
        }
        else{
            SmtpSetting::where('id' , $data->id)->update([
                'mail_driver' => $req->mail_driver,
                'mail_from_name' => $req->mail_from_name,
                'mail_admin_email' => $req->mail_admin_email,
                'mail_encryption' => $req->mail_encryption,
                'mail_from_address'  => $req->mail_from_address,
                'mail_password' => $req->mail_password,
                'mail_port' => $req->mail_port,
                'mail_username' => $req->mail_username,
                'mail_host' => $req->mail_host,
            ]);
        }

      return redirect()->back();
    }
    function smtp_settings_mail(Request $req)
    {
         $data = array (
                        'userEmail' => 'sohaibnoyyan19@gmail.com',
                        'userId' => 1,
                        'type' => 'emailVerification'
                        );
    }
}