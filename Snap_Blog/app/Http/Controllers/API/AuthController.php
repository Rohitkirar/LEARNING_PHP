<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){

        try{
            
            if(Auth::attempt([
                    "username"=>$request->username , 
                    "password"=>$request->password
                ])){
                    $user = $request->user();
                    $user->access_token = $user->createToken("Access_Token")->accessToken;

                    return response()->json([
                        "status"=>true ,
                        "data"=>$user ,
                        "message"=>"User Login Successfully",
                        "status_code"=> 200
                    ] , 200);
                }
            return response()->json([
                "status"=>false ,
                "message"=>"Invalid Credentials",
                "status_code"=> 401
            ] , 401);


        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 404
            ] , 404);
        }

    }
    public function loginSanctum(LoginRequest $request){

        try{
            
            if(Auth::attempt([
                    "username"=>$request->username , 
                    "password"=>$request->password
                ])){
                    $user = $request->user();
                    $user->access_token = $user->createToken("Access_Token")->plainTextToken;

                    return response()->json([
                        "status"=>true ,
                        "data"=>$user ,
                        "message"=>"User Login Successfully",
                        "status_code"=> 200
                    ] , 200);
                }
            return response()->json([
                "status"=>false ,
                "message"=>"Invalid Credentials",
                "status_code"=> 401
            ] , 401);


        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 404
            ] , 404);
        }

    }

    public function register(RegisterRequest $request){

        try{
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'username' => $request->username,
                'password' => $request->password,
            ]);

            if($user){
                return response()->json([
                    "status"=>true ,
                    "data"=>$user ,
                    "message"=>"User Registered Successfully",
                    "status_code"=> 201
                ] , 201);
            }
        }catch(Exception $e){
            return response()->json([
                "status"=>false ,
                "message"=>$e->getMessage(),
                "status_code"=> 404
            ] , 404);
        }

    }

    public function logout(Request $request){

        $request->user()->token()->revoke();
        return response()->json([
            "status"=>true ,
            "message"=>"User Logged Out Successfully",
            "status_code"=> 200
        ] , 200);

    }
}
