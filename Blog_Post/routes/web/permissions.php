<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [PermissionController::class , "index"])->name("permissions.index");

Route::post('/store' , [PermissionController::class , "store"])->name("permissions.store");

Route::get('/{permission}/edit' , [PermissionController::class , "edit"])->name("permissions.edit");

Route::patch('/{permission}/update' , [PermissionController::class , "update"])->name("permissions.update");

Route::delete('/{permission}/destroy' , [PermissionController::class , "destroy"])->name("permissions.destroy");
