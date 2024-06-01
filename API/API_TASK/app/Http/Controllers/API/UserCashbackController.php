<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CashbackCollection;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCashbackController extends Controller
{
    public function index(){
        try{

            $user_cashbacks = Auth::user()->cashbacks()->simplePaginate(10);
            
            return response()->json([
                "success" => true,
                "message" =>"User Cashback Data Found Successfully",
                "payload" => CashbackCollection::make($user_cashbacks),
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
