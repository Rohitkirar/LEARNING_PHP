<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//! Route with Auth middleware globally

Route::get('/create' , [PostController::class , 'create'])->name('posts.create');

Route::post('/store' , [PostController::class , 'store'])->name('posts.store'); 

Route::get('/{post}/edit' , [PostController::class , 'edit'])->middleware('can:view,post')->name("posts.edit");

Route::patch('{post}/update' , [PostController::class , 'update'] )->name("posts.update");

Route::delete('{post}/destroy' , [PostController::class , 'destroy'])->name("posts.destroy");

Route::get('/' , [PostController::class , 'index'])->name('posts.index');   


//! Exclude auth global middleware from Routes

Route::withoutMiddleware('auth')->group(function(){
    
    Route::get('/{post}/show' , [PostController::class , 'show'])->name('post.show');
    
});

?>