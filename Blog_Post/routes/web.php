<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('post/{post}' , [PostController::class , 'show'])->name('post.show');

Route::middleware('auth')->group(function(){

    Route::get('admin' , [AdminController::class , 'index'])->name('admin.index');

    Route::get('admin/users/{user}/show' , [UserController::class , 'show'] )->name('admin.users.show');

    Route::get('admin/users/{user}/edit' , [UserController::class , 'edit'])->name('admin.users.edit');

    Route::patch('admin/users/{user}/update' , [UserController::class , 'update'])->name('admin.users.update');
    
    Route::get('posts' , [PostController::class , 'index'])->name('posts.index');   

    Route::get('posts/create' , [PostController::class , 'create'])->name('posts.create');

    Route::post('posts/store' , [PostController::class , 'store'])->name('posts.store'); 
    
    Route::get('posts/{post}/edit' , [PostController::class , 'edit'])->middleware('can:view,post')->name("posts.edit");

    Route::patch('posts/{post}/update' , [PostController::class , 'update'] )->name("posts.update");

    Route::delete('posts/{post}/destroy' , [PostController::class , 'destroy'])->name("posts.destroy");
    
});

