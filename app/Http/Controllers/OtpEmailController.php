<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Redirect;
use Session;
use App\Mail\Otp;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Responce;
use DateTime;
use Auth;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\OtpCookieController;

class OtpEmailController extends Controller
{
    public function verifyOtpCodeView(Request $request){
        $user = User::find(Auth::User()->userId);
        
        return view('match_email_code');

    }

    public function calculateTimeDifference($currentTime, $dbStoredTime){
        $currentTime = $currentTime->toDateTimeString();

        $oldTime = new DateTime($dbStoredTime);
        $newTime = new DateTime($currentTime);

        $interval = $oldTime->diff($newTime);

        return $interval->i;
    }

    public function verifyOtpCode(Request $request){

        $this->validate($request, [
            'system_generated_code' => 'required|min:6|max:6'
        ]);

        $user = User::find(Auth::User()->userId);
        $currentTime = Carbon::now();   
        $resultantTime = $this->calculateTimeDifference($currentTime, $user->otp_created_at);

        if($resultantTime >= 1){
            User::where('email', $user->email)->update([
                'otp_entered_at' => $currentTime->format('d-m-Y H:i:s'),
                'email_otp_code' => 'Null',
            ]);
            $this->resendOtp($request);
            return redirect(route('match_email_code'))->with('otpExpire', 'your OTP expired');
   
        } else {            
            $user_input_code = $request["system_generated_code"];       
            
            if($user_input_code == $user->email_otp_code){
                // store OTP entered time in DB
                $enteredTime = Carbon::now();

                User::where('email', $user->email)->update([
                    'otp_entered_at' => $enteredTime->format('d-m-Y H:i:s'),
                    'email_otp_code' => 'Null',
                ]);
                $this->otpCheckBox($request);
                return redirect('dashboard');
            }
            else{
                return redirect(route('match_email_code'))->with('status', 'Invalid OTP entered!!');
            }
        }
    }
  
    // resend otp code
    public function resendOtp(Request $request){

        $user = User::find(Auth::User()->userId);
        $obj = new LoginController();

        $regenerateOtp = $obj->sendOtpViaEmail($request, $user->email);

        if($regenerateOtp == true){
            return redirect()->route('match_email_code')->with('notFound' ,'A new otp send to your email address');
        }
        else{
            dd('resend failed');
        }

    }


    public function otpCheckBox($request){
        $check = new OtpCookieController();
        return $check->setOtpCookie($request);
    }

    public function OtpCookieCheck($request){
        $CookieSetOrNot = new OtpCookieController(); 
        $check = $CookieSetOrNot->getOtpCookie($request);
        return $check;
    }
}
