<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ HomeController::class , "index" ] )->name("home");

Route::view('/admindashboard' , "admin.index")->name('admindashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/users' , UserController::class);

    Route::resource('/posts' , PostController::class);

    Route::resource("/comments" , CommentController::class);

    Route::resource("/likes" , LikeController::class);

    Route::resource("/messages" , MessageController::class);

    Route::resource("/commentreplies" , CommentReplyController::class); 

    Route::resource("/images" , ImageController::class);


});

require __DIR__.'/auth.php';
