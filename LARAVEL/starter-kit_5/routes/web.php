<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Categories\CategoryDestroyController;
use App\Http\Controllers\Admin\Categories\CategoryEditController;
use App\Http\Controllers\Admin\Categories\CategoryListController;
use App\Http\Controllers\Admin\Categories\CategoryRestoreController;
use App\Http\Controllers\Admin\Categories\CategoryShowController;
use App\Http\Controllers\Admin\Categories\CategoryStoreController;
use App\Http\Controllers\Admin\Categories\CategoryUpdateController;
use App\Http\Controllers\Admin\Posts\PostRestoreController;
use App\Http\Controllers\Admin\Posts\PostCreateController;
use App\Http\Controllers\Admin\Posts\PostDestroyController;
use App\Http\Controllers\Admin\Posts\PostEditController;
use App\Http\Controllers\Admin\Posts\PostListController;
use App\Http\Controllers\Admin\Posts\PostShowController;
use App\Http\Controllers\Admin\Posts\PostStoreController;
use App\Http\Controllers\Admin\Posts\PostUpdateController;
use App\Http\Controllers\Admin\Users\UserDestroyController;
use App\Http\Controllers\Admin\Users\UserEditController;
use App\Http\Controllers\Admin\Users\UserListController;
use App\Http\Controllers\Admin\Users\UserRestoreController;
use App\Http\Controllers\Admin\Users\UserShowController;
use App\Http\Controllers\Admin\Users\UserUpdateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDashBoardController;
use App\Http\Controllers\User\UserProfileDestroyController;
use App\Http\Controllers\User\UserProfileEditController;
use App\Http\Controllers\User\UserProfileUpdateController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware("auth")->group(function () {

  Route::get('/' , UserDashBoardController::class )->name('dashboard');

  Route::prefix("/user")->group(function(){
    Route::get("/profile" , UserProfileController::class)->name("user.profile.show");
    Route::get("/profile/edit" , UserProfileEditController::class)->name("user.profile.edit");
    Route::delete('/profile' , UserProfileDestroyController::class)->name("user.profile.destroy");
    Route::match( ['put' , 'patch'] , "/profile" , UserProfileUpdateController::class)->name("user.profile.update");
  });

});



Route::prefix("/admin")->middleware(["auth" , 'isAdmin'])->group(function(){
  
  Route::get("/dashboard" , AdminDashboardController::class)->name("admin.dashboard");
  
  Route::get("/users" , UserListController::class)->name("admin.users");
  Route::get("/users/{user}" , UserShowController::class)->name("admin.users.show");
  Route::get("/users/{user}/edit" , UserEditController::class)->name("admin.users.edit");
  Route::match(['put' , 'patch'] , "/users/{user}" , UserUpdateController::class)->name("admin.users.update");
  Route::delete("/users/{user}" , UserDestroyController::class)->name("admin.users.destroy");
  Route::post("/users/{user}/restore" , UserRestoreController::class)->name("admin.users.restore");

  Route::get("/categories" , CategoryListController::class)->name("admin.categories");
  Route::post("/categories" , CategoryStoreController::class)->name("admin.categories.store");
  Route::get("/categories/{category}" , CategoryShowController::class)->name("admin.categories.show");
  Route::get("/categories/{category}/edit" , CategoryEditController::class)->name("admin.categories.edit");
  Route::match(['put' , 'patch'] , "/categories/{category}" , CategoryUpdateController::class)->name("admin.categories.update");
  Route::delete("/categories/{category}" , CategoryDestroyController::class)->name("admin.categories.destroy");
  Route::post("/categories/{category}/restore" , CategoryRestoreController::class)->name("admin.categories.restore");
  
  Route::get("/posts" , PostListController::class)->name("admin.posts");
  Route::get("/posts/create" , PostCreateController::class)->name("admin.posts.create");
  Route::post("/posts" , PostStoreController::class)->name("admin.posts.store");
  Route::get("/posts/{post}" , PostShowController::class)->name("admin.posts.show");
  Route::get("/posts/{post}/edit" , PostEditController::class)->name("admin.posts.edit");
  Route::match(["put" , "patch"] , "/posts/{post}" , PostUpdateController::class)->name("admin.posts.update");
  Route::delete("/posts/{post}" , PostDestroyController::class)->name("admin.posts.destroy");
  Route::post("/posts/{post}/restore" , PostRestoreController::class)->name("admin.posts.restore");


  

});
