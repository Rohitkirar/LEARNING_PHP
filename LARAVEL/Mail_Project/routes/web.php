<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Models\Post;

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


Route::view('/' ,  'home')->name('home'); 

Route::view('/about' ,  'about')->name('about');

Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

Route::get('/login' , [LoginController::class , "login"] )->name('login');

Route::post("/login" , [LoginController::class , "authenticate"]);

Route::get('/userslogout' , [LoginController::class , "logout"])->name('logout');

Route::view('/updatepassword', 'users.updatepassword');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/scope' , function(){
    
    $result = Post::select('title')->where('title' , 'Dr.')->getlatest();

    return $result;
});