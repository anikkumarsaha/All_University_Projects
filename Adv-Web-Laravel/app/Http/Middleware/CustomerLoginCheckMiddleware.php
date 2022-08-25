<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerLoginCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('username')){

            if (session()->get('role')=='Customer') {
                return $next($request);
            }
            else {
                session()->flash("loginCheckMessage","You are not an Customer");
                return redirect()->route('public.login');
                }
            
        }
        else{
            session()->flash("loginCheckMessage","You need to login first");
            return redirect()->route('public.login');
            //return back();
        }
    }
}
