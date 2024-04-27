<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('post/{post}' , [PostController::class , 'show'])->name('post.show');

Route::middleware('auth')->group(function(){

    Route::get('admin' , [AdminController::class , 'index'])->name('admin.index');
    
    Route::get('posts' , [PostController::class , 'index'])->name('posts.index');   

    Route::get('posts/create' , [PostController::class , 'create'])->name('posts.create');

    Route::post('posts/store' , [PostController::class , 'store'])->name('posts.store');    
    
});

