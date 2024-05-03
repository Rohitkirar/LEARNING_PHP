<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get("/" , [PostController::class , "index"])->name("posts.index");
Route::get("/create" , [PostController::class , "create"])->name("posts.create");
Route::post("/store" , [PostController::class , "store"])->name("posts.store");
Route::get("/{post}/show" , [PostController::class , "show"])->name("posts.show");
Route::get("/{post}/edit" , [PostController::class , "edit"])->name("posts.edit");
Route::patch("/{post}/update" , [PostController::class , "update"])->name("posts.update");
Route::delete("/{post}/destroy" , [PostController::class , "destroy"])->name("posts.destroy");