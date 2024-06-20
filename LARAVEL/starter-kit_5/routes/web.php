<?php

use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryRestoreController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostRestoreController;
use App\Http\Controllers\ShowPagesByPostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRestoreController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDashBoardController;
use App\Http\Controllers\User\UserProfileDestroyController;
use App\Http\Controllers\User\UserProfileEditController;
use App\Http\Controllers\User\UserProfileUpdateController;

use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route::middleware('auth')->group(function () {
//   Route::get('/', UserDashBoardController::class)->name('dashboard');

//   Route::prefix('/user')->group(function () {
//     Route::get('/profile', UserProfileController::class)->name('user.profile.show');
//     Route::get('/profile/edit', UserProfileEditController::class)->name('user.profile.edit');
//     Route::delete('/profile', UserProfileDestroyController::class)->name('user.profile.destroy');
//     Route::match(['put', 'patch'], '/profile', UserProfileUpdateController::class)->name('user.profile.update');
//   });
// });

Route::prefix('/admin')
->middleware(['auth', 'isAdmin'])
->group(function () {
  
    Route::get('/', UserDashBoardController::class)->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posts', PostController::class);

    Route::get("/pages/{postId}/create", [PageController::class, "create"])->name("pages.create");
    
    Route::resource('/pages', PageController::class)->except('create');

    Route::post('/users/{user}/restore', UserRestoreController::class)->name('users.restore');
    Route::post('/posts/{post}/restore', PostRestoreController::class)->name('posts.restore');
    Route::post('/categories/{category}/restore', CategoryRestoreController::class)->name('categories.restore');
    
    Route::get('/posts/{post}/pages', ShowPagesByPostController::class)->name('posts.pages');

  });
