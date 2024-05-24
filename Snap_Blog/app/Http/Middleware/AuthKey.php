<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthKey
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
        if($request->header('Auth_Key') == "48929078-3974-4fee-a73e-cbc2e9218aeb"){
            return $next($request);
        }
        return response()->json([
                                "message" => "unauthorized access" , 
                                "status" => false , 
                                "status_code" => 401
                                ] , 401
                            );
    }
}
