<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/" , [UserController::class , "index"])->name("users.index");
Route::get("/create" , [UserController::class , "create"])->name("users.create");
Route::post("/store" , [UserController::class , "store"])->name("users.store");
Route::get("/{user}/show" , [UserController::class , "show"])->name("users.show");
Route::get("/{user}/edit" , [UserController::class , "edit"])->name("users.edit");
Route::patch("/{user}/update" , [UserController::class , "update"])->name("users.update");
Route::delete("/{user}/destroy" , [UserController::class , "destroy"])->name("users.destroy");
Route::put("/{user}/restore" , [UserController::class , "restore"])->name("users.restore");