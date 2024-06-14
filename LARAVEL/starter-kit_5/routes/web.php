<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Users\UserDestroyController;
use App\Http\Controllers\Admin\Users\UserEditController;
use App\Http\Controllers\Admin\Users\UserListController;
use App\Http\Controllers\Admin\Users\UserRestoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDashBoardController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware("auth")->group(function () {

  Route::get('/dashboard' , [UserDashBoardController::class , 'index'])->name('dashboard');
  Route::get('/' , [UserDashBoardController::class , 'index'])->name('dashboard');

  Route::get("/user/profile" , [UserProfileController::class , 'show'])->name("profile.show");

});



Route::prefix("/admin")->middleware("auth")->group(function(){
  
  Route::get("/dashboard" , AdminDashboardController::class)->name("admin.dashboard");
  Route::get("/users" , UserListController::class)->name("admin.users");
  Route::get("/users/{users}/edit" , UserEditController::class)->name("admin.users.edit");
  Route::delete("/users/{users}" , UserDestroyController::class)->name("admin.users.destroy");
  Route::post("/users/{users}/restore" , UserRestoreController::class)->name("admin.users.restore");


});
