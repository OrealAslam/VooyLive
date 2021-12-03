<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class NotTeamLeader
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
        if(Auth::check()){
            if(Auth::User()->user_type == 2){
                return redirect()->route('home');
            }
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
