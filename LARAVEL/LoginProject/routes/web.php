<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Doctrine\DBAL\Driver\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/role' , [ 'middleware'=>['role' , 'auth'] , function(){
    
    return "";

}]);

Route::get('/userlogin' , function(){
    session(['user_id'=> 9]);
    return "you are loginned";
});

Route::get('/userlogout' , function(){
    session()->forget('user_id');
    return "please login first";
});

Route::get('/adminpage' , function(){
    return "You are login as Admin ";
})->middleware('UserAuth');

Route::get('/userpage' , function(){
    return "you are login as user";
})->middleware('UserAuth');


Route::get('/admin'  , [ AdminController::class , 'index' ]);

Auth::routes();

// Route::auth(); // this is used before v 5.3 of laravel that generate only basic routes 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
