<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::middleware("auth")->group(function () {
  Route::get("/user/profile" , [UserProfileController::class , 'show'])->name("profile.show");
  $controller_path = 'App\Http\Controllers';
  Route::get('/', [HomeController::class , 'index'])->name('pages-home');
  Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');
  Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
});

Route::prefix("admin")->middleware("auth")->group(function(){

});
