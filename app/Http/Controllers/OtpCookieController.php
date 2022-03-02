<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\User;
// use Responce;
use App\Http\Controllers\OtpEmailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;


class OtpCookieController extends Controller
{
    // set Cookie (Remember me token)
    public function setOtpCookie($request){

        if($request['remember_device'] == 'on'){
            $minute = 20;
            $response = new Response('Hello World');
            $response->withCookie(cookie('name', $request['remember_device']), $minute);
            return $response;
        }
    } 

    public function getOtpCookie($request){
        $value = $request->cookie('rememberOtp');
        return $value;
    }
}
