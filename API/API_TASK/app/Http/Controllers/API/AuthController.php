<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Resources\UserLoginResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class AuthController extends Controller
{

    public function username(){
        return "username";
    }

    public function register(RegisterRequest $request){

        try{
            $user = User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "gender" => $request->gender,
                "birth_date" => $request->birth_date,
                "phone_number" => $request->phone_number,
                "username" => $request->username,
                "email" => $request->email,
                "password" =>  $request->password
            ]);

            $user->access_token = $user->createToken("Access Token")->accessToken;
            
            return response()->json([
                "success" => true,
                "message" => "User Registeration Successfully",
                "payload" => ["data" => UserLoginResource::make($user)],
                "status" => 200
            ] , 200 ); 

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ], 404);
        }

    }

    public function login(LoginRequest $request){
        
        try{
            if(Auth::attempt([ "username"=>$request->username , "password"=>$request->password ])){
                $user = Auth::user();
                $user->access_token = $user->createToken("Access Token")->accessToken;

                return response()->json([
                    "success" => true,
                    "message" => "User Login Successfully",
                    "payload" => UserLoginResource::make($user),
                    "status" => 200
                ] , 200);   
            }

            return response()->json([
                "success" => false,
                "message" => "Invalid Credentials",
                "data" => [],
                "status" => 401 
            ] , 401);

        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

    public function logout(){
        try{
            
            if(Auth::user()->token()->revoke()){ 
                return response()->json([
                    "success" => true,
                    "message" => "User Logged Out Successfully",
                    "payload" =>   [ "data" => [] ] ,
                    "status" => 200
                ] , 200);
            }

            #token() return only current token
            #tokens()->delete() to delete all tokens

            // if($tokens = Auth::user()->tokens()->pluck('id')){
            //     Token::whereIn("id" , $tokens)->update(["revoked" => true]);
            //     return response()->json([
            //         "success" => true,
            //         "message" => "User Logged Out Successfully",
            //         "data" => [],
            //         "status" => 200
            //    ]);
            // }
        }
        catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ] , 404);
        }
    }

}
