<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GiftCardCollection;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserGiftCardController extends Controller
{
    public function index(){
        try{

            $userGiftCards = Auth::user()->giftCards()->paginate(10);
            
            return response()->json([
                "success" => true,
                "message" => "User Gift Cards found Successfully",
                "payload" => GiftCardCollection::make($userGiftCards),
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
