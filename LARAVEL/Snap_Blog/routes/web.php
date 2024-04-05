<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::view('/' ,  'home');

Route::view('/about' ,  'about');

Route::view('/login' ,  'common.login');

Route::view('/register' ,  'common.register');

Route::resource('/user' , UserController::class);

