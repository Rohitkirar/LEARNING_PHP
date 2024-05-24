<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicAuth
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
        Auth::onceBasic("username");

        // if(Auth::onceBasic("username")){    #to change the login field email -> username
        //     return response()->json([ "message" => "unauthorised access" , "status"=>false , "status_code"=> 401] , 401);
        // }
        
        return $next($request);
    }
}
