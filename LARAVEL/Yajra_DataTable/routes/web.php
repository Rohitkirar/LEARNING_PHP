<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/getDataTable', [ProfileController::class, 'getDataTable'])->name('profile.getDataTable');

// users routes

Route::get("/users" , [UserController::class , "index"])->name("users.index");

// posts routes

Route::get("posts" , [PostController::class , "index"])->name("posts.index");

Route::delete("posts/{post}/destroy" , [PostController::class , "destroy"])->name("posts.destroy");

Route::patch("posts/{post}/restore" , [PostController::class , "restore"])->name("posts.restore");

//  medias 
Route::get("/medias" , function(){
    return view("mediaIndex");
});

Route::get("/getMediaData" , function(){

    $datatable = DataTables::of(Image::query());
    $datatable->editColumn("imageable_type" , '{{ basename($imageable_type) }}');
    return $datatable->make();

})->name("getMediaData");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
