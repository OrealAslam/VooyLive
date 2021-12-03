<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ReferralController extends Controller
{
 	public function referralsList(){

        $user = Auth::User();

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
        $data['user'] = $user = Auth::User();
        $data['referrals'] = Auth::User()->referrals()->paginate(config('app.paginate'));
        return view('account.referrals',$data);
    }   
}
