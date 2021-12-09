<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\RegisterLinks;
use App\Post;
use Auth;
use App\Mail\UserSignup;
use Illuminate\Support\Facades\Mail;
use App\ClientDetail;
use Carbon\Carbon;
use App\Jobs\ProcessEmails;
use App\Credit;
use App\Plan;
use Exception;

class SubscribeCont extends Controller
{
	public function showRegistrationForm(Request $request){
		return view('auth.register');
	}

    public function updateSubscription(Request $request){
        $user=Auth::User();
        try{
            $planObj = Plan::where('planId', $request->plan)->first();

            if($planObj->is_team){
                $user->update(['user_type' => 1]);                    
            }else{
                $user->update(['user_type' => NULL]);
            }
            
            $user->subscription('main')->swap($request->plan);
            $user->plan=$request->plan;
            $user->save();
            return back()->with('success','Subscription Changed');
        }
        catch(Exception $e){
            return redirect()->route('purchase.plan');
        }
        
    }

    public function cancelSubscription(){
        $user=Auth::User();
        try {
            //$user->subscription('main')->resume();
            //$user->subscription('main')->cancelNow();
            $user->subscription('main')->cancel();
            $data = array (
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'date' => date("Y-m-d H:i:s"),
                    'userEmail' => $user->email,
                    'type' =>'userCancel'
            );
            //ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
            ProcessEmails::dispatch($data)->delay(Carbon::now())->onQueue('high');

            //$user->subscription('main')->swap('provider-plan-id');
            return back()->with('status','Subscription Cancelled Succcessfully');

        } catch (\Exception $e) {
            return back()->with('status','Request Cannot be completed at the moment');
        }


    }
     /**
     * Process the form
     */
    public function registerUser(Request $request)
    {   
        $newUser = 0;
        // grab the user
        $user = $request->user();


        // if there is no user, we have to create one
        if ( ! $user) {
            $this->validate($request, [
    	        'email' => 'required|string|email|max:255|unique:users',
	            'password' => 'required|string|min:6|confirmed',
	            'firstName' => 'regex:/^[\pL\s\'&-]+$/u',
				'lastName' => 'regex:/^[\pL\s\'&-]+$/u',
                // 'title' => 'test',
                // 'region' => 'required',
                'referral_code' => 'sometimes|nullable|exists:users,referral_code'
	        ]);

            $referralUser = User::where('referral_code', $request->input('referral_code'))->first();

             // create and login
            try {

                //create referral code
                $referral_code = strtoupper($request->input('firstName'));
                $referral_code = preg_replace('/\s+/', '', $referral_code);
                $userRecCount = User::where('referral_code', $referral_code)->count();
                if ($userRecCount > 0) {
                    $i=1;
                    do {
                        $userRecCount = User::where('referral_code', $referral_code.$i)->count();
                        if ($userRecCount == 0) {
                            $referral_code = $referral_code.$i;
                            break;
                        } else {
                            $i++;
                        }
                    } while (true);
                }
                $userCreateData = [
                    'firstName' => $request->input('firstName'),
                    'lastName' => $request->input('lastName'),
                    // 'region' => $request->input('region'),
                    'plan' => $request->input('plan'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'email_token' => base64_encode($request->input('email').time()),
                    'referral_code' => $referral_code,
                ];
                
                $user = User::create($userCreateData);

                $newUser = 1;

                $details=new ClientDetail();
                $details->userId=$user->userId;
                $details->title='null';
                $details->save();


                //change status of register link in database
                $register_link = $request->input('register_link');
                $registerLink = RegisterLinks::where('link',$register_link)->first();
                if ($registerLink) {
                    $registerLink->status = 'used';
                    $registerLink->save();
                }
                //send email verification
                $data = array (
                        'userEmail' => $user->email,
                        'userId' => $user->userId,
                        'type' => 'emailVerification'
                        );
                // Mail::to($request->input('email'))->send(new UserSignup($data));
                ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                // //14 day
                //  $data = array (
                //         'userEmail' => $user->email,
                //         'userId' => $user->userId,
                //         'type' => 'firstReminder'
                //         );
                // // Mail::to($request->input('email'))->send(new UserSignup($data));
                // ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                // //7 day
                // $data = array (
                //         'userEmail' => $user->email,
                //         'userId' => $user->userId,
                //         'type' => 'secondReminder'
                //         );
                // // Mail::to($request->input('email'))->send(new UserSignup($data));
                // ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                //charge notification
                //  $data = array (
                //         'userEmail' => $user->email,
                //         'userId' => $user->userId,
                //         'type' => 'emailVerification'
                //         );
                // // Mail::to($request->input('email'))->send(new UserSignup($data));
                // ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                // //year reminder
                //  $data = array (
                //         'userEmail' => $user->email,
                //         'userId' => $user->userId,
                //         'type' => 'emailVerification'
                //         );
                // // Mail::to($request->input('email'))->send(new UserSignup($data));
                // ProcessEmails::dispatch($data)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                /*
                // user Register mail to admin
                $adminNotidata = array (
                        'userEmail' => env('MAIL_ADMIN_EMAIL'),
                        'userId' => $user->userId,
                        'type' => 'newUserRegisterAdminNotification'
                        );
                ProcessEmails::dispatch($adminNotidata)->delay(Carbon::now()->addSeconds(2))->onQueue('high');
                */


                //Auth::login($user);
            } catch (\Exception $e) {
                return back()->withErrors(['message' => 'Error creating user.'.$e->getMessage()]);
            }


            if ($referralUser) {
                //add credits to REFERRER
                $mCredit=new Credit();
                $mCredit->descr = 'Referral User Created';
                $mCredit->user_id = $referralUser->userId;
                $mCredit->type = 'referrer';
                // $mCredit->credit = env('REFERRER_CREDITS');
                $mCredit->credit = 0;
                $mCredit->referred_to = $user->userId;
                $mCredit->save();
                //add credits to REFERRAL
                $mCredit=new Credit();
                $mCredit->descr = 'New User Created through Referral';
                $mCredit->user_id = $user->userId;
                $mCredit->type = 'referral';
                // $mCredit->credit = env('REFERRAL_CREDITS');
                $mCredit->credit =  0;
                $mCredit->referred_by = $referralUser->userId;
                $mCredit->save();
            }
        }

        // create the users subscription
        // grab the credit card token
        $ccToken = $request->input('cc_token');
       
        $plan = $request->input('plan');

        // create the subscription
        // try {
        //     $user = User::find($user->userId);
            //$user->updateCard($ccToken);
            
            /*
            $response = $user->newSubscription('main', $plan)->trialDays(config('app.trial_period'))->create($ccToken, [
                'email' => $user->email
            ]);
            */
            /*
            $response = $user->newSubscription('main', $plan)->skipTrial()->create($ccToken, [
                'email' => $user->email
            ]);
            */
            
            /*
            $response =  $user->newSubscription('main', $plan)->create($ccToken, [
                'email' => $user->email
            ]);
            */

            // $user->createAsStripeCustomer($ccToken, [
            //     'email' => $user->email
            // ]);


            // $user->plan=$plan;
            // $user->save();
            //$user->setStripeId($ccToken);

            // featch current_period_end from stripe and update in local database
            /*
            $user = User::find($user->userId);
            $subscriptionObj = $user->subscription('main');
            $stripId = $subscriptionObj->stripe_id;


            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $stripResponse = \Stripe\Subscription::retrieve($stripId);
            //echo $stripResponse->current_period_end.'=>';
            //echo Carbon::createFromTimestamp($stripResponse->current_period_end);

            $subscriptionObj->renews_at = Carbon::createFromTimestamp($stripResponse->current_period_end);
            $subscriptionObj->save();
            */
            

                /*
                var_dump($ccToken);
                var_dump($user->subscribed('main',$user->plan));
                var_dump($user->subscribedToPlan('main',$user->plan));
                die();
                */

            //$user->charge('1500');

            //user->updateCard($ccToken);
        // } catch (\Exception $e) {
        //     return redirect('subscribe')->withErrors(['message' => 'Error creating subscription.'.$e->getMessage()]);
        // }

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
        return redirect(Route('registerSuccess'));
        
    }

    public function registerSuccess(Request $request)
    {
        Auth::logout();
        return view('auth.registerSuccess');
    }

    public function verifyEmail($token, Request $request)
    {
        $user = User::where('email_token',$token)->first();
        if ($user) {
            $user->verified = 1;
            $user->email_token = '';
            if ($user->save()) {
                try {
                    $response = $user->newSubscription('main', $user->plan)->trialDays(config('app.trial_period'))->create();
                    //$response = $user->newSubscription('main', $user->plan)->skipTrial()->create();

                } catch (\Exception $e) {
                    return redirect(Route('verifyEmail', ['token' => $token]))->withErrors(['message' => 'Error creating subscription.'.$e->getMessage()]);
                }
                return view('auth.verifyEmail',['user'=>$user]);
            }
        } else {
            return abort(404);
        }
    }

    public function activeAccount(Request $request,$token)
    {
        $user = User::where('email_token',$token)->first();
        User::where('userId',$user->userId)->update(['verified'=>1]);
        return view('auth.activeSuccess');
    }

}
