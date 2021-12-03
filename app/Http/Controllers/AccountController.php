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
use App\ProfileColor;

class AccountController extends Controller
{
    public function updateUserInfo(Request $request)
    {
        $check = ClientDetail::where('userId', $request->pk)->first();
        
        if($request->field == 'color'){

            $user = User::find(Auth::User()->userId);

            $user->profilecolor_id = null;

            $user->save();
        }

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

    public function selectColourName(Request $request)
    {
        $selectColourName =  ProfileColor::where('name',$request->name)->first();

        $updateClientDetails = ClientDetail::where('userId',Auth::User()->userId)->first();
          
        $user = User::find(Auth::User()->userId);

        if($request->name == 'no-select'){
            $user->profilecolor_id = null;
            $colorName = 'No Selection';
        } else{
            $colorName = $selectColourName->name;

            $user->profilecolor_id = $selectColourName->id;
           
            ClientDetail::where('userId',Auth::User()->userId)->update([
                'colora' => $selectColourName->headings,
                'colorb' => $selectColourName->sub_headings,
                'colorc' => $selectColourName->footer,
                'colord' => $selectColourName->background_1,
                'colore' => $selectColourName->background_2,
                'colorf' => $selectColourName->icons_only,
            ]);
        } 

        $user->save();


        return response()->json(['success'=> $colorName ]);
    }
}
