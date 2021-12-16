<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {	
    	$input = $request->all();

    	$validator = Validator::make($input, [
            'firstName' => 'required',
            'lastName' => 'required',
            // 'title' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

    	if($validator->passes()){
    		$user = User::create([
	            'firstName' => $input['firstName'],
	            'lastName' => $input['lastName'],
	            // 'title' => $input['title'],
	            'email' => $input['email'],
	            // 'region' => 1,
	            'password' => bcrypt($input['password']),
	        ]);

    		$userData = User::where('userId',$user)->first();

    		if ($userData->verified == 1) {
	            return redirect('dashboard');
	        }else{
            	return redirect(Route('registerSuccess'));
	        }
    	}
    	
        return redirect()->back();
    }
}