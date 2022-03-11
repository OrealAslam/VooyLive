<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Hdi;
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
use App\Icon;
use App\Tag;
use App\IconTag;
use App\Credit;

class HdiController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        Cashier::useCurrency('cad');
    }

    public function hdisList(){
        $data['user']=Auth::User();

        if(Auth::User()->user_type == 1){
          $clientList = getClientList(Auth::User()->userId);
           $data['hdis'] = Hdi::whereIn('user_id',$clientList)->paginate(config('app.paginate'));
        }else{
            $data['hdis'] = Auth::User()->hdis()->paginate(config('app.paginate'));
        }

        return view('account.hdis',$data);
    }

    public function generateHdi(Request $request) {
        $data = array();
        $user = Auth::User();
        $data['user'] = $user;
        $validateUser = getValidateUser();

        if ($request->isMethod('post')) {
            $rules = array(
                'hdiName' => 'required|max:255',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator);
            } else {
                //for pay as you go user
                if (in_array($validateUser->plan, config('app.pay_as_you_go_packages'))) {
                    if ($user->subscription('main')->onTrial()) {
                        $params = [
                            'name' => $request->hdiName,
                            'status' => 1,
                            'total' => (double)0,
                            'type'=>'trial'
                        ];
                        return $this->createHdi($params);
                    } else {
                        $hdiPrice=(double)env('HDICHARGE');
                        $credit_price = (double)env('HDICHARGE_CREDIT') / 100;
                        if ($validateUser->getBalanceCredits() >= $credit_price) {
                            $mCredit=new Credit();
                            $mCredit->descr = 'Hdi Bought';
                            $mCredit->user_id = $validateUser->userId;
                            $mCredit->type = 'product';
                            $mCredit->product = 'hdi';
                            $mCredit->credit =  -$credit_price;
                            $mCredit->save();

                            $params = [
                                'name' => $request->hdiName,
                                'status' => 1,
                                'total' => (double)0,
                                'type'=>'credit'
                            ];
                            return $this->createHdi($params);

                        } else {
                            if ($request->discount != null) {
                                $discount = DiscountCode::where([['code', $request->discount], ['times', '>', 0], ['startDate', "<", Carbon::now()->toDateString()], ['endDate', ">", Carbon::now()->toDateString()]])->first();
                                if ($discount != null) {
                                    if ($discount->type == 'percent') {
                                        $hdiPrice = (int)(((100 - (float)$discount->value) * $hdiPrice) / 100);
                                    } else {
                                        $hdiPrice = (int)(($hdiPrice - ((float)$discount->value * 100)));
                                    }
                                    $discount->times = ($discount->times - 1);
                                    $discount->save();
                                }
                            }
                            $tax = (5 / 100);
                            $taxAmount = ($tax * $hdiPrice);
                            $hdiPrice = (int)round(($hdiPrice + $taxAmount),0);
                            $response=$user->charge($hdiPrice);
                            $params = [
                                'name' => $request->hdiName,
                                'status' => 1,
                                'stripe_id'=>$response->id,
                                'total'=>$response->amount,
                                'type'=>'paid'
                            ];
                            return $this->createHdi($params);
                        }
                    }
                } elseif (in_array($validateUser->plan, config('app.monthly_packages'))) {
                    $params = [
                        'name' => $request->hdiName,
                        'status' => 1,
                        'total' => (double)0,
                    ];
                    if ($validateUser->subscription('main')->onTrial()) {
                        $params['type'] = 'trial';
                        return $this->createHdi($params);
                    } else {
                        $params['type'] = 'paid';
                        return $this->createHdi($params);
                    }
                }
            }
        }
    }

    public function createHdi($data) {
        $user = Auth::User();
        try{
            $hdi = $user->hdis()->create($data);
            $hdiId=$hdi->id;

            //send email
            $data = array (
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'hdiId' => $hdi->id,
                    'userId' => $user->userId,
                    'hdiName' => $hdi->name,
                    'amount' => (double)($hdi->total / 100),
                    'hdiDate' => $hdi->created_at,
                    'userEmail' => $user->email,
                    'type' => 'buyHDIReport'
                    );
            ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');


            $response=Storage::exists('hdis/sample.json');
            if ($response==true) {
                $hdiData=Storage::get('hdis/sample.json');
                Storage::put('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json', $hdiData);
            }
            return (array('status'=>1, 'hdiId'=> $hdiId, 'userId' => $user->userId, 'msg'=>'House Details Infographic Created Successfully'));
        }
        catch(Exception $e) {
            return (array('status'=>0, 'msg'=>'Unable to create House Details Infographic at the moment'));
        }
    }

    public function viewHdi(Request $request, $hdiId, $userId) {
        $data = array();
        $data['hdiId'] = $hdiId;
        $data['userId'] = $userId;
        $data['editMode'] = false;

        if (Auth::check()) {
            $user=Auth::User();
            $user = User::where('userId', $user->userId)->first();
            if ($user->role != 'admin') {
                if (in_array($userId, getClientList($userId))) {
                    $hdi=Hdi::where([['user_id',$userId],['id',$hdiId]])->count();
                    if($hdi == 0) {
                        Session::flash('error_msg', 'Access Denied');
                        return redirect(route('hdis-list'));
                    }
                    $data['editMode'] = true;
                } else {
                    Session::flash('error_msg', 'Access Denied');
                    return redirect(route('hdis-list'));
                }
            } else {
                $user = User::where('userId', $userId)->first();
                $hdi=Hdi::where([['user_id',$userId],['id',$hdiId]])->count();
                if($hdi == 0) {
                    return redirect(route('dashboard'));
                }
            }
        } else {
            $user = User::where('userId', $userId)->first();
            $hdi=Hdi::where([['user_id',$userId],['id',$hdiId]])->count();
            if($hdi == 0) {
                return redirect(route('home'));
            }
        }
        $hdi = Hdi::findOrfail($hdiId);
        $data['user'] = $user;
        $data['hdi'] = $hdi;
        if ($request->isMethod('post')) {
            $response=Storage::exists('hdis/'.$request->userId.'/'.$hdiId.'/'.$hdiId.'.json');
            if ($response==true) {
                $hdiData=Storage::get('hdis/'.$request->userId.'/'.$hdiId.'/'.$hdiId.'.json');
                $hdiData = json_decode($hdiData, true);
                $hdiData[$request->hdi_field_id] = trim($request->hdi_field_value);
                $hdiData = json_encode($hdiData);
                if (Storage::put('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json', $hdiData)) {
                    return (array('status'=>1, 'msg'=>'House Details Infographic updated Successfully'));
                } else {
                    return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
                }
            } else {
                return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
            }
        } else {
            $response=Storage::exists('hdis/'.$request->userId.'/'.$hdiId.'/'.$hdiId.'.json');
            if ($response==true) {
                $hdiData=Storage::get('hdis/'.$request->userId.'/'.$hdiId.'/'.$hdiId.'.json');
            } else {
                $response=Storage::exists('hdis/sample.json');
                if ($response==true) {
                    $hdiData=Storage::get('hdis/sample.json');
                    Storage::put('hdis/'.$request->userId.'/'.$hdiId.'/'.$hdiId.'.json', $hdiData);
                }
            }
        }

        $hdiData = json_decode($hdiData, true);
        /*
        echo '<pre>';
        print_r($hdiData);
        die();
        */

        $details=$user->ClientDetail;
        $data['user_details'] = $details;
        //$userHdiImagePath = 'hdis/'.$user->userId.'/'.$hdiId.'/';
        $hdiIconPath = 'hdi_icons/';
        $data['hdiData'] = $hdiData;
        /*
        $search_str = array ('{client_logo}', '{client_image}', '{client_name}', '{client_phone}', '{client_email}',
            '{flyer_image1}', '{flyer_image2}', '{flyer_image3}', '{flyer_image4}', '{flyer_image5}', '{flyer_image6}', '{flyer_image7}', '{flyer_image8}', '{flyer_image9}');
        $replace_str = array(
            !empty($details->logo) ? '/'.$details->logo : '',
            !empty($details->photo) ? '/'.$details->photo : '',
            !empty($user->firstName) || !empty($user->lastName) ? $user->firstName .' '. $user->lastName : 'client name',
            !empty($details->phone) ? $details->phone : 'phone',
            !empty($details->email) ? $details->email : 'email',

            file_exists($userFlyerImagePath.'img1.jpeg') ? $userFlyerImagePath.'img1.jpeg' : 'img/flyer/img1.jpg',
            file_exists($userFlyerImagePath.'img2.jpeg') ? $userFlyerImagePath.'img2.jpeg' : 'img/flyer/img2.jpg',
            file_exists($userFlyerImagePath.'img3.jpeg') ? $userFlyerImagePath.'img3.jpeg' : 'img/flyer/img3.jpg',
            file_exists($userFlyerImagePath.'img4.jpeg') ? $userFlyerImagePath.'img4.jpeg' : 'img/flyer/img4.jpg',
            file_exists($userFlyerImagePath.'img5.jpeg') ? $userFlyerImagePath.'img5.jpeg' : 'img/flyer/img5.jpg',
            file_exists($userFlyerImagePath.'img6.jpeg') ? $userFlyerImagePath.'img6.jpeg' : 'img/flyer/img6.jpg',
            file_exists($userFlyerImagePath.'img7.jpeg') ? $userFlyerImagePath.'img7.jpeg' : 'img/flyer/img7.jpg',
            file_exists($userFlyerImagePath.'img8.jpeg') ? $userFlyerImagePath.'img8.jpeg' : 'img/flyer/img8.jpg',
            file_exists($userFlyerImagePath.'img9.jpeg') ? $userFlyerImagePath.'img9.jpeg' : 'img/flyer/img9.jpg',

        );
        */
        /*
        var_dump($userFlyerImagePath.'img2.jpeg');
        var_dump(file_exists($userFlyerImagePath.'img2.jpeg'));
        var_dump(file_exists($userFlyerImagePath.'img2.jpeg') ? $userFlyerImagePath.'img2.jpeg' : 'img/flyer/img2.jpg');
        die();
        */

        $data['hdi_images'] = array(
            'items_0_icons' => '',
            'items_1_icons' => '',
            'items_2_icons' => '',
            'items_3_icons' => '',
            'items_4_icons' => '',
            'items_5_icons' => '',
            'items_6_icons' => '',
            'items_7_icons' => '',
            'items_8_icons' => '',
            'items_9_icons' => '',
            'items_10_icons' => '',
            'items_11_icons' => ''
        );
        foreach ($data['hdi_images'] as $key => $val) {
            if (!empty($hdiData[$key])) {
                if (file_exists($hdiIconPath.$hdiData[$key])) {
                    $data['hdi_images'][$key] = $hdiIconPath.$hdiData[$key];
                } else {
                    $data['hdi_images'][$key] = $hdiIconPath.'0.svg';
                }
            } else {
                $data['hdi_images'][$key] = $hdiIconPath.'0.svg';
            }
        }
        //$data['flyerData'] = str_replace($search_str,$replace_str,$data['flyerData']);
        return view('hdi.view',$data);
    }
    public function updateImage(Request $request, $hdiId, $userId)
    {
        $user=Auth::User();
        if ($request->isMethod('post')) {
            /*
            echo '<pre>';
            print_r($request->all());
            echo '1=>'.$request['hdi_icon_name'];
            echo '2=>'.$request->hdi_icon_name;
            echo '3=>'.$request->input('hdi_icon_name');
            echo '<hr>';
            die();
            */
            if ($request->input('type')) {
                //change hdi icon from current icons
                if ($request->input('type') == 'update-hdi-icon') {
                    $hdiIconPath = 'hdi_icons/';
                    $response=Storage::exists('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json');
                    if ($response==true) {
                        $hdiData=Storage::get('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json');
                        $hdiData = json_decode($hdiData, true);
                        $hdiData[$request->hdi_icon_name] = trim($request->icon_file);
                        $hdiData = json_encode($hdiData);
                        if (Storage::put('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json', $hdiData)) {
                            $newIconData = Storage::get($hdiIconPath.'/'.$request->icon_file);
                            $newData = [
                                'status'=>1,
                                'msg'=>'House Details Infographic updated Successfully',
                                'new_icon_data' => $newIconData
                            ];
                            return ($newData);
                        } else {
                            return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
                        }
                    } else {
                        return (array('status'=>0, 'msg'=>'Something goes wrong, Please try later'));
                    }
                } elseif ($request->input('type') == 'upload-hdi-icon') {
                    $iconData = array();
                    $response = array();
                    $newIconTags = array();
                    $rules = array(
                        'img_name' => 'required',
                        'icon_file' => 'required|image|max:1000|mimes:svg',
                        'icon_name' => 'required'
                    );
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        return (['status'=>0, 'msg'=>['icon_file' => $errors->first('icon_file'), 'icon_name' => $errors->first('icon_name')]]);
                    } else {
                        if ($request->input('icon_tags')) {
                            $newIconTags = explode(",", $request->input('icon_tags'));
                            $request->request->remove('icon_tags');
                        }

                        if ($request->hasFile('icon_file') && $request->file('icon_file')->isValid()) {
                            $image = $request->file('icon_file');
                            $icon_file = time().'.'.$image->getClientOriginalExtension();
                            $destinationPath = public_path('/hdi_icons');
                            $image->move($destinationPath, $icon_file);

                            $iconData['icon_file'] = $icon_file;
                        }

                        $iconData['name'] = $request->input('icon_name');
                        if ($iconRec = $user->icons()->create($iconData)) {
                            $response['icon_file'] = array('status'=>1, 'msg'=>'Icon added Successfully');
                        } else {
                            $response['icon_file'] = array('status'=>0, 'msg'=>'unable to add Icon, please try latter');
                        }

                        try {
                            $resp = $this->upsertIconTags($iconRec->id, $newIconTags, 'edit');
                            $response['icon_tags'] = array('status'=>1, 'msg'=>'Tags added Successfully');
                        } catch(Exception $e) {
                            $response['icon_tags'] = array('status'=>0, 'msg'=>'unable to add Tags, please try latter');
                        }

                        $fileData = Storage::get('/hdi_icons/'.$iconRec->icon_file);
                        //$find_string   = '<svg';
                        //$position = strpos($fileData, $find_string);
                        //$fileDataNew = substr($fileData, $position);
                        $response['new_icon_data'] = $fileData;

                        $hdiIconPath = 'hdi_icons/';
                        $fileResponse=Storage::exists('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json');
                        if ($fileResponse==true) {
                            $hdiData=Storage::get('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json');
                            $hdiData = json_decode($hdiData, true);
                            $hdiData[$request->hdi_icon_name] = trim($iconRec->icon_file);
                            $hdiData = json_encode($hdiData);
                            if (Storage::put('hdis/'.$user->userId.'/'.$hdiId.'/'.$hdiId.'.json', $hdiData)) {
                                $response['icon_update'] = array('status'=>1, 'msg'=>'hdi icon updated Successfully');
                            } else {
                                $response['icon_update'] = array('status'=>0, 'msg'=>'Something goes wrong, Please try later');
                            }
                        }
                        return $response;
                    }
                }
            }
        }
    }

    public function iconGalleryProcess(Request $request, $userId)
    {
        if ($request->isMethod('post')) {
            $micon = new Icon;
            $hdiIconPath = 'hdi_icons/';

            $result = $micon->getAllIcons($request->input('params'));
            if ($result['status'] == 1) {
                foreach ($result['icons']['data'] as $key => $val) {
                    if (Storage::exists($hdiIconPath.'/'.$val->icon_file)) {
                        $fileData = Storage::get($hdiIconPath.'/'.$val->icon_file);
                        
                        //$find_string   = '<svg';
                        //$position = strpos($fileData, $find_string);
                        //$fileDataNew = substr($fileData, $position);
                        
                        $val->icon_data = $fileData;
                    }
                }
            }
            
            return $result;
        }
    }

    public function getIconTags(Request $request, $userId)
    {
        if ($request->isMethod('post')) {
            $mTag = new Tag();
            $result = $mTag->getTags($request->input('q'), $request->input('limit'));
            if ($result) {
                return json_encode($result);
            } else {
                return json_encode(['status'=> false]);
            }
        }
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

}
