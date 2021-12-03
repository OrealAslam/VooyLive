<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkSubscription
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
        
        if (Auth::guest()==false) {

            $user=Auth::user();
            if($user->role!='admin'){

                if($user->verified == '' || $user->verified == 0) {
                    Auth::logout();
                    return redirect(Route('registerSuccess'));
                }

                if($user->subscribed('main',$user->plan) == false)
                    return redirect('/subscribe');
            }
        }
        
        return $next($request);

    }
}
