<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testEmail()
    {
    	$datas = [
            'email' => 'test',
        ];

        \Mail::send('emails.testEmail', $datas, function($message) use ($datas) 
        {
            $message->to(\Request::get('mail'));
            $message->subject('testing');
        });

        dd('Mail Send Successfully.');
    }
}
