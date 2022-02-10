<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use App\ContactUs;
use Illuminate\Support\Facades\Mail;
use Auth;

//use Mail;


class PageController extends Controller
{
    public function contactUs(Request $request)
    {
        $data = [];
        if (Auth::check()) {
            $user=Auth::User();
            $data['isLoggedIn'] = true;
            $data['clientName'] = $user->firstName.' '.$user->lastName;
            $data['clientEmail'] = $user->email;
        } else {
            $data['isLoggedIn'] = false;
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'name'      => 'required|max:255',
                'email' => 'required|email|max:255',
                'message'   => 'required|max:512',
                'g-recaptcha-response' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $msgData = ['name' => $request->name,'email' => $request->email,'message' => $request->message];
                if(isset($request->phone) && !empty($request->phone)){
                    $msgData['phone'] = $request->phone;
                }

            if (Auth::check()) {
                ContactUs::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                ]);
                $datas = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'msg' => $request->message,
                ];

                Mail::send('emails.contactUs', $datas, function($message) use ($datas) 
                {
                    $message->to('info@dharro.com');
                    $message->subject('Contact Us from VOOY GROUP CANADA INC');
                });

                if( count(Mail::failures()) > 0 ) {
                    Session::flash('error_msg', 'Email is not able to Send, please try Later');
                } else {
                    Session::flash('success_msg', 'Email Sent Successfully');
                }
            }else{
                Session::flash('error_msg','Please register before contact us.');
            }

            }
        }
        return view('page.contactUs',$data);
    }

    public function commingNext(Request $request)
    {
        $data = [];
        $data['page'] = 'commingNext';

        return view('page.commingNext',$data);
    }

    public function howItWorks(Request $request)
    {
        $data = [];

        return view('page.howItWorks',$data);
    }

    public function newTemplate(Request $request)
    {
        $data = [];
        return view('page.newTemplate',$data);
    }

    public function flyer(Request $request)
    {
        $data = [];
        return view('page.flyer',$data);
    }
    public function houseDetailsInfographic(Request $request)
    {
        $data = [];
        $user=Auth::User();
        $data['user'] = $user;

        return view('page.hdi',$data);
    }

}
