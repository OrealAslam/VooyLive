<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use App\User;
use App\Http\Controllers\OtpEmailController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use IlluminateCookieCookieJar;
use Redirect;
use Illuminate\Support\Facades\Input;


class OtpCookieController extends Controller
{
    // set Cookie (Remember me token)
    public function setOtpCookie(Request $request){
        // $remember_device=$request->input('remember_device');
        // $cookie_name="remember_device";
        // $cookie_value="PhpScots";
        // $cookie_expired_in=3600;//in mins
        // $cookie_path='/'; // available to all pages of website.
        // $cookie_host=$request->getHttpHost(); // domain or website you are setting this cookie.
        // $http_only=false;
        // //Creating cookie;
        // $my_cookie= cookie($cookie_name, $cookie_value,$cookie_expired_in,$cookie_path,$cookie_host,$http_only);
        // // sending response to browser, make sure you send this, if you not send Laravel not able to identify this cookie.
        // $response = new Response('cookie set');
        // dd($response->withCookie($my_cookie));
        // return redirect('dashboard')->withCookie(Cookie::make($cookie_name, $cookie_value,$cookie_expired_in));
        $minute = 60;
        $response = new Response('cookie set');
        $response->withCookie(cookie('name', 'value', $minute));
        // dd($response);
        return $response;
    } 

    public function getOtpCookie(Request $request){
        // dd($request->cookie('remember_device'));
        return $request->cookie('remember_device');
        // dd($request->cookie('CookieName'));
        // $value = $request->cookie('name');
        // dd($value);
        // return $value;
    }

     // destroy cookie
    // public function unsetCookie(Request $request){
    //     return responce('cookie deleted')->cookie('CookieName', '', -1);
    // }
}
