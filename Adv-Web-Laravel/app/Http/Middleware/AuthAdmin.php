<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tokens;
use App\Models\Accounts;
use Illuminate\Support\Str;

class AuthAdmin
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
        $key=$request->header("Authorization");
        
        if ($key)
        {
            $token=Tokens::where('token',$key)->where('role','Admin')
                        ->whereNUll('expired_at')->first();
            if($token)
            {
                return $next($request);             
            }
            return response()->json(["msg"=>"Expired token",'token'=>$token],401);
        }
        return response()->json(["msg"=>"Invalid"],401);
    }
}
