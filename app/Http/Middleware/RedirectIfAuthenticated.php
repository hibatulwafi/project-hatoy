<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       /*/ if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }*/

    if ($guard == 'login') {
        if (Auth::guard($guard)->check()) {
               return redirect('/index');
        }
   }else {
        if (Auth::guard($guard)->check()) {
               return redirect('/index');
        }
   }

    return $next($request);
}
}
