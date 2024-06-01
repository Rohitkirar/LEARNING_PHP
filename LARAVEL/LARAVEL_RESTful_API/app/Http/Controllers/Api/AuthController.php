<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = [
            "email"=>$request->email,
            "password"=>$request->password
        ];

        if(!Auth::attempt($credentials)){
            return response()->toJson(["message"=>"Invalid credentials"] , 401);
        }

        $user = $request->user();
        $token = $user->createToken("Access Token");
        $user->access_token = $token->plainTextToken;

        return response()->json(["user" => $user], 200);

    }

    public function register(Request $request){
        try{

            $validator = Validator::make($request->all() , [
                "name"=>"required|string|min:3",
                "email"=>"required|email|unique:users",
                "password"=>"required|string|confirmed|min:8"
            ]);

            if($validator->fails()){
                return response()->json( $validator->errors() , 401);
            }

            $user = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt("$request->password")
            ]);

            return response()->json(["message"=>"User Registered Successfully" , "user"=>$user] , 200);
        
        }
        catch(Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
