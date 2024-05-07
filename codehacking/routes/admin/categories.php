<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get("/" , [CategoryController::class , "index"])->name("categories.index");

Route::get("/create" , [CategoryController::class , "create"])->name("categories.create");

Route::post("/store" , [CategoryController::class , "store"])->name("categories.store");

Route::get("/{category}/edit" , [CategoryController::class , "edit"])->name("categories.edit");

Route::patch("/{category}/update" , [CategoryController::class , "update"])->name("categories.update");

Route::delete("/{category}/destroy" , [CategoryController::class , "destroy"])->name("categories.destroy");

Route::put("/{category}/restore" , [CategoryController::class , "restore"])->name("categories.restore");