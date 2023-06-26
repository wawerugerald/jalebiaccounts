<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AccountantMiddleware
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
        {
            if (Auth::user()->user_role == 'accountant') {
                # code...    
                return $next($request);    
            } else {
                # code...
                return redirect('/home');
            }      
        }
    }
}
