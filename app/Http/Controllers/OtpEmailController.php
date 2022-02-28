<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Redirect;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OtpEmailController extends Controller
{

    public function verifyOtpCodeView(Request $request){
        return view('match_email_code');
    }

    public function verifyOtpCode(Request $request){

        $this->validate($request, [
            'system_generated_code' => 'required|min:5|max:5'
        ]);
        // stored OTP code
        $userMail = User::where('email', session('user_email'))->pluck('email_otp_code');
        
        $user_input_code = $request["system_generated_code"];       
        
        if($user_input_code == $userMail[0]){

            // date_default_timezone_set('Asia/Karachi');
            // $currentDateTime=date('m/d/Y H:i:s');
            // $enteredTime = date('h:i', strtotime($currentDateTime));

            $enteredTime = Carbon::now();

            User::where('email', session('user_email'))->update([
                'otp_entered_at' => $enteredTime->toTimeString(),
                'email_otp_code' => 'Null',
            ]);

            return redirect('dashboard');
        }
        else{
            return redirect(route('match_email_code'))->with('status', 'Invalid OTP entered!!');
        }

    }

    public function calcTimeDiff($curr_time, $db_time){
        return $curr_time - $db_time;
    }
}
