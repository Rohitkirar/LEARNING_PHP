<?php

use Illuminate\Support\Facades\Route;

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

//routes example
Route::get('/about' , function(){

    return ("<h1>you are in about page</h1>");

});

Route::get('/login' , function(){

    return ("<h1> Please Login to continue</h1>");

});

Route::get('/register' , function(){

    return ("<h1> please Register Yourself</h1>");

});

// we can pass parameter in url and use them
Route::get('/userdetails/{id}/{name}' , function($id , $name){

    return "<h1>Id : $id <BR> Name : $name</h1>";

} );

Route::get('/userdetails/{id},{name}' , function($id , $name){

    return "<h1>Id : $id <BR> Name : $name</h1>";

});

//url alias
Route::get("admin/user/rk/index/about" , array("as" => "admin.rk" , function(){

    $url = route("admin.rk");
    return "Url is $url"  . "  -> " .  route("admin.rk");

}));

// call controller method

//Case sensitive while path passing 

// passing variable in function by url

Route::get('/{text}' , "App\Http\Controllers\UserController@index");


use App\Http\Controllers\UserController;
Route::get('/{text}' , [UserController::class , 'index']);


Route::resource("/user/form" , "App\Http\Controllers\UserController" );