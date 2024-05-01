<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//! Route with Auth middleware globally

Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');

Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');

Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

Route::put('/{user}/attachRole', [UserController::class, 'attachRole'])->name("users.attachRole");

Route::put('/{user}/detachRole', [UserController::class, 'detachRole'])->name("users.detachRole");
