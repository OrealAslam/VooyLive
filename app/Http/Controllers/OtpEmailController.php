<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Session;
use App\Mail\Otp;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Classes\simple_html_dom;
use Illuminate\Http\Requests;
use Illuminate\Http\Response;
use DateTime;
use Auth;
use Cookie;
use Illuminate\Support\Facades\Input;

class OtpEmailController extends Controller
{
    public function verifyOtpCodeView(Request $request)
    {
        $user = User::find(Auth::User()->userId);

        return view('match_email_code');
    }

    public function calculateTimeDifference($currentTime, $dbStoredTime)
    {
        $currentTime = $currentTime->toDateTimeString();

        $oldTime = new DateTime($dbStoredTime);
        $newTime = new DateTime($currentTime);

        $interval = $oldTime->diff($newTime);

        return $interval->i;
    }

    public function verifyOtpCode(Request $request)
    {

        $this->validate($request, [
            'system_generated_code' => 'required|min:6|max:6'
        ]);
        $user = User::find(Auth::User()->userId);
        $currentTime = Carbon::now();
        $resultantTime = $this->calculateTimeDifference($currentTime, $user->otp_created_at);

        if ($resultantTime >= env('OTP_EXPIRATION_TIME')) {
            User::where('email', $user->email)->update([
                'otp_entered_at' => $currentTime,
                'email_otp_code' => 'Null',
            ]);
            $this->resendOtp($request);
            return redirect(route('match_email_code'))->with('otpExpire', 'your OTP expired');
        } else {
            $user_input_code = $request["system_generated_code"];

            if ($user_input_code == $user->email_otp_code) {
                //set cookie if checkbox is checked 
                if (isset($request->remember_device)) {

                    $minute = 30 * 24 * 60;
                    Cookie::queue('OPTcookie', 'OTP', $minute);

                    //cannot set cookie here so saving session
                    // $request->session()->put('setcookie','true');
                }


                $enteredTime = Carbon::now();

                User::where('email', $user->email)->update([
                    'otp_entered_at' => $enteredTime,
                    'email_otp_code' => 'Null',
                ]);

                return redirect('dashboard');
            } else {
                return redirect(route('match_email_code'))->with('status', 'Invalid OTP entered!!');
            }
        }
    }

    // resend otp code
    public function resendOtp(Request $request)
    {

        $user = User::find(Auth::User()->userId);
        $obj = new LoginController();

        $regenerateOtp = $obj->sendOtpViaEmail($request, $user->email);

        if ($regenerateOtp == true) {
            return redirect()->route('match_email_code')->with('notFound', 'A new otp sent to your email address');
        } else {
            dd('resend failed');
        }
    }
}
