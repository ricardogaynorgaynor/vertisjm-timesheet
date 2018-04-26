<?php

namespace App\Http\Middleware;

use Closure;


use Auth;
use Session;

class AdminMiddleware
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
        if(Auth::user()->u_type == 'man') // is an admin
        {
           return $next($request); // pass the admin
            
        }

       
        return redirect()->route('accessdenied');
    }
}
