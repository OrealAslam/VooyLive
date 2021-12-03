<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::check()) {
            if (Auth::User()->role != 'admin') {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/');
        }
        return $next($request);
        /*
        if (Auth::User()!=NULL) {
            if (Auth::User()->role != 'admin')
                return redirect('/dashboard');        }
        return $next($request);
        */

    }
}
