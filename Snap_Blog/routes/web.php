<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;



Route::get('/', [ HomeController::class , "index" ] )->name('home');


Route::view('/admindashboard' , "admin.index")->name('admindashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// User Routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [User\UserController::class, 'dashboard'])->name('users.dashboard');

    Route::resource('/users' , User\UserController::class);

    Route::resource('/posts' , User\PostController::class);

    Route::resource("/comments" ,User\CommentController::class);

    Route::post("/likes/store" , [User\LikeController::class , 'store'])->name("likes.store");



    // Route::resource("/messages" , MessageController::class);

    // Route::resource("/commentreplies" , CommentReplyController::class); 

    // Route::resource("/images" , ImageController::class);

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes

Route::middleware(['auth' , 'role'])->group(function () {

    Route::get('/admindashboard', [Admin\UserController::class , "dashboard"] )->name('admin.dashboard');
    Route::get('/admin/users' , [Admin\UserController::class , "index"])->name("admin.users.index");
    Route::get('/admin/users/create' , [Admin\UserController::class , "create"])->name("admin.users.create");
    Route::post('/admin/users/store' , [Admin\UserController::class , "store"])->name("admin.users.store");
    Route::get('/admin/users/{user}' , [Admin\UserController::class , "show"])->name("admin.users.show");
    Route::get('/admin/users/{user}/edit' , [Admin\UserController::class , "edit"])->name("admin.users.edit");
    Route::patch('/admin/users/{user}/update' , [Admin\UserController::class , "update"])->name("admin.users.update");
    Route::get('/admin/users/{user}/destroy' , [Admin\UserController::class , "destroy"])->name("admin.users.destroy");
    Route::get('/admin/users/{user}/restore' , [Admin\UserController::class , "restore"])->name("admin.users.restore");

    Route::get('/admin/posts' , [Admin\PostController::class , "index"])->name("admin.posts.index");
    Route::get('/admin/posts/create' , [Admin\PostController::class , "create"])->name("admin.posts.create");
    Route::post('/admin/posts/store' , [Admin\PostController::class , "store"])->name("admin.posts.store");
    Route::get('/admin/posts/{user}' , [Admin\PostController::class , "show"])->name("admin.posts.show");
    Route::get('/admin/posts/{user}/edit' , [Admin\PostController::class , "edit"])->name("admin.posts.edit");
    Route::patch('/admin/posts/{user}/update' , [Admin\PostController::class , "update"])->name("admin.posts.update");
    Route::get('/admin/posts/{user}/destroy' , [Admin\PostController::class , "destroy"])->name("admin.posts.destroy");
    Route::get('/admin/posts/{user}/restore' , [Admin\PostController::class , "restore"])->name("admin.posts.restore");



});


require __DIR__.'/auth.php';
