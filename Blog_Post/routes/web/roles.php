<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [RoleController::class , "index"])->name("roles.index");

Route::get('/create' , [RoleController::class , "create"])->name("roles.create");

Route::post('/store' , [RoleController::class , "store"])->name("roles.store");

Route::get('/{role}/show' , [RoleController::class , "show"])->name("roles.show");

Route::get('/{role}/edit' , [RoleController::class , "edit"])->name("roles.edit");

Route::patch('/{role}/update' , [RoleController::class , "update"])->name("roles.update");

Route::delete('/{role}/destroy' , [RoleController::class , 'destroy'])->name("roles.destroy");

Route::put('/{role}/attachPermission' , [RoleController::class , 'attachPermission'])->name("roles.attachPermission");

Route::put('/{role}/detachPermission' , [RoleController::class , 'detachPermission'])->name("roles.detachPermission");