<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


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


Route::get('/admin' , [ 'middleware'=>['auth'] ,  function(){
    
    $user = Auth::user();

    if($user->role == 'admin'){
        echo "<h1>Admin page</h1>";
    }
    else{
        echo "<h1>User Login</h1>";
    }

    dd($user);

}]);

Auth::routes();

// Route::auth(); // this is used before v 5.3 of laravel that generate only basic routes 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
