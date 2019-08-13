<?php

namespace App\Http\Middleware;

use Closure;

class roleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleIDneeded)
    {
        // CHECK IF WE ARE ALLOWED TO ACCESS PAGES THAT WE REQUEST
        if(auth()->user()->roleID != $roleIDneeded)
        {
            return redirect('/')->with('error', ':(');
        }


        return $next($request);
    }
}
