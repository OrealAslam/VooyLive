<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OtpEmailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;
use App\Category;
use App\User;
use Carbon\Carbon;
// use Mail;
use App\Mail\Otp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin-dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', Input::get('email'))->first();

        if(is_null($user)){
            Session::flash('success_msg', 'Email-Address Not Fetched');
            return redirect()->route('login');
        }else{
            if($user->password == ''){
                Session::flash('success_msg','Your password has expired. Please reset your password here');
                return redirect()->route('password.request',['user'=>$user->email]);
            }else{

                $credentials = $request->only('email', 'password');

                $user = User::where('email', $credentials['email'])->first();

                $orderMoreCredit = Category::where('type',1)->first();
          
                if($user->user_type == 2 && $user->verified == 0){
                    return redirect(Route('notActiveuser'));
                }else{
                    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

                        if($user['verified'] == 1){
                            // user IP store in DB
                            $db_ip = $user->ip_address;
                            
                            // check if the user ip match with DB ip or not ??
                            if($request->ip() == $db_ip){
                                // match current time and last login time 
                                 
                                $curr_time = Carbon::now();


                                $db_time = $user["otp_created_at"];

                                // $obj = new OtpEmailController;       

                                // match system time and db time
                                               
                                // if($obj->calcTimeDiff($curr_time->toTimeString(), $db_time) >= 24){
                                //     return redirect()->route('match_email_code');
                                // }
                                // else{
                                //     return redirect('dashboard');
                                // }   
                            }
                            else{
                                // redirect to otp verify view

                                $code = mt_rand(11111, 99999);

                                $data = [
                                    'otp' => $code
                                ];

                                $email = $user->email;
                                session(['user_email'=> $email]);

                                session()->put('otpCode', $code);

                                // // get sthe system current time and format it.
                                // date_default_timezone_set('Asia/Karachi');
                                // $currentDateTime=date('m/d/Y H:i:s');
                                // $createTime = date('h:i', strtotime($currentDateTime));
                                
                                $create_time = Carbon::now();

                                
                                // sending OTP via email
                                Mail::to($email)->send(new Otp($data));

                                // UPDATE EMAIL_OTP_FIELD, ip, otp_creation_date in DB
                                User::where('email', $email)->update([
                                    'email_otp_code' => $code,
                                    'ip_address' =>$request->ip(),
                                    'otp_created_at' => $create_time->toTimeString(),
                                ]);

                                return redirect()->route('match_email_code');
                            }

                            if($request['orderCredit'] == 'orderMoreCredit'){
                                return redirect()->route('order',$orderMoreCredit->slug);
                            }
                            // return redirect('dashboard');
                        }else{
                            return redirect(Route('registerSuccess'));
                        }
                    }
                }

                // Wrong Password Send Admin Mail
                if($user->role == 'admin'){

                    $datas = [
                        'email' => $user->email,
                        'ip' => \Request::ip(),
                    ];

                    \Mail::send('emails.wrongPasswordAdminLogin', $datas, function($message) use ($datas) 
                    {
                        $message->to($datas['email']);
                        $message->subject('Too many failed login attempts');
                    });
                }

                Session::flash('success_msg', 'Email-Address And Password Are Wrong.');
                return redirect()->route('login');
            }
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        if (Session::exists('is_admin_logged_in') && Session::pull('is_admin_logged_in', 0) == 1) {
            $id = Session::pull('admin_id', 0);
            if(Auth::loginUsingId($id)) {
                return redirect()->route('adminDashboard');
            } else {
                $this->guard()->logout();
                $request->session()->invalidate();
                return redirect('/');
            }
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/');
        }
    }

}
