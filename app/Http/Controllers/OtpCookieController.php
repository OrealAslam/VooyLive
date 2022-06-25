<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use App\User;
use App\Http\Controllers\OtpEmailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use IlluminateCookieCookieJar;
// use App\Classes\simple_html_dom;
use Redirect;
use Illuminate\Support\Facades\Input;


class OtpCookieController extends Controller
{
    // set Cookie (Remember me token)
    public function setOtpCookie(Request $request){
        $minutes = 20;
        $response = new Response('cookie set');
        $response->withCookie(cookie('nameCookie', 'valueCookie', $minutes));
        return $response;
    } 

    public function getOtpCookie(Request $request){
        return $request->cookie('setOtpCookie');
    }
}
