<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGiftCardController extends Controller
{
    public function index(){
        try{

            $user = Auth::user()->load("giftCards");
            
            return response()->json([
                "success" => true,
                "message" => "User Gift Cards found Successfully",
                "data" => $user,
                "status" => 200
            ], 200);

        }catch(Exception $e){
            return response()->json([
                "success"=>false,
                "message" => $e->getMessage(),
                "status" => 404
            ] , 404);
        }
    }
}
