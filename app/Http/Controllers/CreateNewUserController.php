<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;
use Session;
use App\User;
use App\ClientDetail;

class CreateNewUserController extends Controller
{

	public function usersList(Request $request)
	{	
		$usersList = User::where('parent_id',Auth::User()->userId)->get();

        $clientList = User::where('parent_id',Auth::User()->userId)->get();

        $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();

		if(Auth::User()->user_type == 1){
			return view('userList',compact('usersList','userCreateSubUser'));
		}else{
			return redirect()->route('home');
		}
	}

	public function createSubUser(Request $request)
    {
        $userCreateSubUser = User::where('parent_id',Auth::User()->userId)->count();

        if($userCreateSubUser < Auth::user()->planMaster->team_member){
            return view('account.createSubUser');        
        }else{
            return redirect()->route('home');
        }
    }

    public function createNewUserRegister(Request $request)
    {	
    	$input = $request->all();

    	$user = User::where('email',$input['email'])->first();
    	
    	$validator = Validator::make($input, [
            'email' => 'unique:users,email,$user->userId,userId',
            'firstName' => 'required',
            'lastName' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->passes()){

        	$user = User::create([
        		'firstName' => $input['firstName'],
        		'lastName' => $input['lastName'],
        		'email' => $input['email'],
        		'parent_id' => Auth::User()->userId,
        		'user_type' => 2,
        		'role' => 'client',
        		'password' => Hash::make($input['password']),
        		'email_token' => base64_encode($request->input('email').time()),
        	]);

            $details = new ClientDetail();
            $details->userId = $user->userId;
            $details->title='null';
            $details->save();

        	$datas = [
	            'email' => $user->email,
	            'firstName' => $user->firstName,
	            'lastName' => $user->lastName,
	            'emailToken' => $user->email_token,
	        ];

	        \Mail::send('emails.userActiveAccount', $datas, function($message) use ($datas) 
	        {
	            $message->to($datas['email']);
	            $message->subject('Activate Your Account');
	        });

            Session::flash('success_msg', 'Sub User Create Successfuly');
    		return redirect()->route('users.list');
        }

        return redirect()->back()->withErrors($validator)->withInput(); 
    }

    public function verified(Request $request,$id)
    {
        $user = User::find($id);
        $user->update(['verified' => $request->status]);
        if($request->status == 0){
            return response()->json(['error'=>'User Deactive successfully.']);
        }else{
            return response()->json(['success'=>'User Active successfully.']);
        }
    }   
}