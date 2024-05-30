<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth_Key
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
        if($request->header("auth_key") == "c62ac536-e563-4613-8c50-1c783479503e"){
            return $next($request);
        }
        return response()->json([
            "success" => false,
            "message" => "Unauthenticated Request",
            "data" => [],
            "status" => 401
        ]);
    }
}
