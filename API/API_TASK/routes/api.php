<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\GiftCardController;
use App\Http\Controllers\API\GiftCardProductController;
use App\Http\Controllers\API\UserCashbackController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserGiftCardController;
use App\Models\Category;
use App\Models\GiftCardProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("user")->middleware("auth_key")->group(function(){

    Route::post("/login" , [AuthController::class , "login"]);
    Route::post("/register" , [AuthController::class , "register"]);

});

Route::middleware("auth:api")->group(function(){

    Route::middleware("role")->group(function(){

        Route::get("categories" , [CategoryController::class , "index"]);
        Route::post("categories" , [CategoryController::class , "store"]);
        Route::get("categories/{category}" , [CategoryController::class , "show"]);
        Route::match(["put" , "patch"] , "categories/{category}" , [CategoryController::class , "update"]);
        Route::delete("categories/{category}" , [CategoryController::class , "destroy"]);

        Route::post("gift_card_products", [GiftCardProductController::class , "store" ]);
        Route::match(["put" , "patch"] , "gift_card_products/{product}" , [GiftCardProductController::class , "update"]);
        Route::delete("gift_card_products/{product}" , [GiftCardProductController::class , "destroy"]);

    });

    Route::post("user/logout" , [AuthController::class , "logout"]);
    
    Route::get("user/profile" , [UserController::class , "profile"]);
    Route::post("user/update" , [UserController::class , "update"]);
    Route::post("user/password/update" , [UserController::class , "passwordUpdate"]);

    Route::get("gift_card_products" , [GiftCardProductController::class , "index"]);
    Route::get("gift_card_products/{product}", [GiftCardProductController::class , "show"]);

    Route::post("gift_cards/{card}" , [GiftCardController::class , "store"]);
    
    Route::get("user/gift_cards" , [UserGiftCardController::class , "index"]);
    Route::post("user/gift_cards/{card}/destroy" , [GiftCardController::class , "destroy"]);
    Route::match(['put' , 'patch'] , "user/gift_cards/{card}" , [GiftCardController::class , "update"]);

    Route::get("user/cashbacks" , [UserCashbackController::class , "index"]);


    
    

});
