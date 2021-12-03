<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUserCheckPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){

            $url = $request->input('type');
            
            if($url == 'orderMoreCredit'){
                return redirect()->intended('login?type=orderMoreCredit');
            }else{
                return redirect()->intended('login'); 
            }
        }
        if(Auth::User()->parent_id == NULL || Auth::User()->user_type == 1){
            return $next($request);
        }else{
            if(checkPlan(Auth::User()->parent_id)){
                return $next($request);
            }else{
                return redirect()->route('notFoundPage'); 
            }
        }
        return $next($request);
    }
}
