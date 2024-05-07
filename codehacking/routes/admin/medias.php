<?php

use App\Http\Controllers\Admin\MediaController;
use Illuminate\Support\Facades\Route;

Route::get("/" , [MediaController::class , "index"])->name("medias.index");

Route::get("/create" , [MediaController::class , "create"])->name("medias.create");

Route::post("/store" , [MediaController::class , "store"])->name("medias.store");