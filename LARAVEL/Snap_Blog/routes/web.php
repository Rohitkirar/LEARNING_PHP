<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;

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

Route::resource('/' ,  IndexController::class )->only(['index' , 'create' , 'store' ]); 

Route::view('/about' ,  'about');

Route::view('/login' ,  'common.login');

Route::resource('/user' , UserController::class);

