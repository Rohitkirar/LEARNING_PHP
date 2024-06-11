<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CashbackCollection;
use App\Http\Resources\UserResource;
use App\Models\Cashback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCashbackController extends Controller
{
    public function index(){
        try{

            $userCashbacks = Cashback::with("giftCard")->simplePaginate(10);
            
            return response()->json([
                "success" => true,
                "message" =>"User Cashback Data Found Successfully",
                "payload" => CashbackCollection::make($userCashbacks),
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
