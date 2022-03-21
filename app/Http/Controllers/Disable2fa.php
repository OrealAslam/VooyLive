<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;

class Disable2fa extends Controller
{

    public function disableOtpAuth(Request $request){

        $user = User::find(Auth::User()->userId);
        $user['2FA_status'] = $request->faStatus == 'true' ? 1 : 0;
        $user->save();

        return redirect(route('profileview', compact('user')));

    }
}
