<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;



Route::get('/', [ HomeController::class , "index" ] )->name('home');

// User Routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [User\UserController::class, 'dashboard'])->name('users.dashboard');
    Route::get('/users/{user}' , [User\UserController::class, 'show'])->name("users.show");
    Route::get('/users/{user}/edit' , [User\UserController::class, 'edit'])->name("users.edit");
    Route::patch('/users/{user}/update' , [User\UserController::class, 'update'])->name("users.update");
    Route::delete('/users/{user}' , [User\UserController::class, 'destroy'])->name("users.destroy");

    Route::get('/posts' , [User\PostController::class, 'index'])->name("posts.index");
    Route::get('/posts/create' , [User\PostController::class, 'create'])->name("posts.create");
    Route::post('/posts' , [User\PostController::class, 'store'])->name("posts.store");
    Route::get('/posts/{post}' , [User\PostController::class, 'show'])->name("posts.show");
    Route::get('/posts/{post}/edit' , [User\PostController::class, 'edit'])->name("posts.edit");
    Route::patch('/posts/{post}' , [User\PostController::class, 'update'])->name("posts.update");
    Route::delete('/posts/{post}' , [User\PostController::class, 'destroy'])->name("posts.destroy");

    Route::get("/comments/index" , [User\CommentController::class , 'index'])->name('comments.index');

    Route::post("/comments" , [User\CommentController::class, 'store'] )->name("comments.store");

    Route::post("/likes" , [User\LikeController::class , 'store'])->name("likes.store");

    Route::delete("/images/{image}" , [ImageController::class , 'destroy'])->name("images.destroy");

});

// Admin routes

Route::middleware(['auth' , 'role'])->group(function () {

    Route::get('/admindashboard', [Admin\UserController::class , "dashboard"] )->name('admin.dashboard');
    Route::get('/admin/users' , [Admin\UserController::class , "index"])->name("admin.users.index");
    Route::get('/admin/users/create' , [Admin\UserController::class , "create"])->name("admin.users.create");
    Route::post('/admin/users' , [Admin\UserController::class , "store"])->name("admin.users.store");
    Route::get('/admin/users/{user}' , [Admin\UserController::class , "show"])->name("admin.users.show");
    Route::get('/admin/users/{user}/edit' , [Admin\UserController::class , "edit"])->name("admin.users.edit");
    Route::patch('/admin/users/{user}' , [Admin\UserController::class , "update"])->name("admin.users.update");
    Route::delete('/admin/users/{user}' , [Admin\UserController::class , "destroy"])->name("admin.users.destroy");
    Route::post('/admin/users/{user}' , [Admin\UserController::class , "restore"])->name("admin.users.restore");

    Route::get('/admin/posts' , [Admin\PostController::class , "index"])->name("admin.posts.index");
    Route::get('/admin/posts/create' , [Admin\PostController::class , "create"])->name("admin.posts.create");
    Route::post('/admin/posts' , [Admin\PostController::class , "store"])->name("admin.posts.store");
    Route::get('/admin/posts/{user}' , [Admin\PostController::class , "show"])->name("admin.posts.show");
    Route::get('/admin/posts/{user}/edit' , [Admin\PostController::class , "edit"])->name("admin.posts.edit");
    Route::patch('/admin/posts/{user}' , [Admin\PostController::class , "update"])->name("admin.posts.update");
    Route::delete('/admin/posts/{user}' , [Admin\PostController::class , "destroy"])->name("admin.posts.destroy");
    Route::post('/admin/posts/{user}' , [Admin\PostController::class , "restore"])->name("admin.posts.restore");

    Route::get("/comments/{post}/post" , [CommentController::class , "commentsByPost"])->name("admin.comments.post");
    Route::get("/comments" , [CommentController::class , "index"])->name("admin.comments.index");
    Route::delete("/comments/{comment}" , [CommentController::class , "destroy"])->name("admin.comments.destroy");
    Route::post("/comments/{comment}/restore" , [CommentController::class , "restore"])->name("admin.comments.restore");



});


require __DIR__.'/auth.php';
