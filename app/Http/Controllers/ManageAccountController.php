<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Plan;
use App\User;
use Validator;
use Redirect;
use Auth;

class ManageAccountController extends Controller
{
    public function manage(){
    	
        $data['userCreateSubUser'] = User::where('parent_id',Auth::User()->userId)->count();

        if(!empty(Auth::user()->planMaster->team_member)){
            // $data['totalUserCreate'] = Auth::user()->planMaster->team_member - $data['userCreateSubUser'];
            $data['totalUserCreate'] = Auth::user()->planMaster->team_member;
        }

        $data['user']=$user=Auth::User();
        $data['sidebar']=view('account.accountSidebar',$data);
        $data['startDate']=false;
        $data['renews_at']=false;
        $data['endDate']=false;
        
        $data['trial_ends_at']=false;
        if($user->subscribed('main',$user->plan)==false){
            $data['status']='No Active Subscription';
            $data['subscribed']=false;
            $data['plan']='No Active Plan';
        }
        else
        {
            $data['subscribed']=true;

            if ($user->subscribed('main',$user->plan)) {
                $plan = Plan::where('planId', $user->plan)->first();
                if (!is_null($plan)) {
                    $data['plan'] = $plan->name;
                }else{
                    $data['plan'] = 'No Active Plan';
                }
            } else {
                $data['plan'] = 'No Active Plan';
            }
            //$data['plan']=($user->subscribed('main',$user->plan)?$user->plan:'No Active Plan');

            if ($user->subscription('main', $user->planId)->onTrial()) {
                $data['status']='Trialing';

                if ($user->subscription('main', $user->planId)->cancelled()) {
                    $data['status'] = $data['status'].' - Subscription Cacnceled';
                }

                $data['trial_ends_at']=$user->subscription('main')->trial_ends_at;
                
            }else{
                $data['status']='User Active '; 
                $data['startDate']=$user->subscription('main')->created_at; 
                $data['startDate'] = ($data['startDate'] != '') ? date("Y-m-d", strtotime($data['startDate'])) : $data['startDate'];
                if ($user->subscription('main')->cancelled()) {
                    $data['endDate']=$user->subscription('main')->ends_at;
                    $data['endDate'] = ($data['endDate'] != '') ? date("Y-m-d", strtotime($data['endDate'])) : $data['endDate'];
                    $data['status'] .= '- Subscription Cacnceled';
                    $data['subscribed']=false;
                } else {
                    $data['renews_at']=$user->subscription('main')->renews_at;
                    $data['renews_at'] = ($data['renews_at'] != '') ? date("Y-m-d", strtotime($data['renews_at'])) : $data['renews_at'];
                    $data['status'] .= '- Subscription Active';
                }
            }
        }
        
        if(Auth::User()->user_type == 2){
            return redirect()->route('notFoundPage');
        }else{
            return view('account.manage',$data);
        }
    }

    public function manageInfo(Request $request){
        $user=$request->user();
        try{
            $user->updateCard($request->input('cc_token'));
            return redirect('account/manage')->with('status','Payment Info Update');
        }
         catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error Updating Payment Method.']);
        }
    }
}
