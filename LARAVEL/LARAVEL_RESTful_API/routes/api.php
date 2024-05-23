<?php

use App\Http\Controllers\Country\CountryController;
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

Route::get("/country" , [CountryController::class , 'country'] );

Route::get("/country/{country}" , [CountryController::class , 'countryById'] );

Route::post("/country" , [CountryController::class , 'createCountry'] );

Route::put("/country/{country}", [CountryController::class , 'updateCountry']);

Route::delete("/country/{country}", [CountryController::class , 'deleteCountry']);

Route::apiResource("countrys" , CountryController::class);