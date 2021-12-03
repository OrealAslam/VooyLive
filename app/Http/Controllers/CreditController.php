<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserDebit;
use App\User;

class CreditController extends Controller
{
    public function creditsList(){

        $user = Auth::User();

        $data['user'] = $user=Auth::User();

        $data['debit'] = UserDebit::where('user_id',$user->userId)->latest()->get();

        $data['credits'] = Auth::User()->credits()->latest()->get();

        return view('account.credits',$data);
    }
}
