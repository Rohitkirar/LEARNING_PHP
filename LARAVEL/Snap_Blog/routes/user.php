<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\PostImage;


Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

Route::view('/updatepassword', 'users.updatepassword');


Route::get('user/image', function () {
    $postImages = User::find(9)->postImages;
    dd($postImages[15]);
});


Route::get('image/user', function () {
    $user = PostImage::find(3)->user;
    dd($user);
});


Route::get('/deleteuser' , function(){
    
    $result = User::where('id' , 13)->delete();

    if($result)
        return "user Deleted successfully";
    else    
        return "failed to delete user";
});

Route::get('/destroyuser' , function(){
    
    $result = User::destroy(13);

    if($result)
        return "user destroy successfully";
    else    
        return "failed to destroy user";
});

Route::get('/restoreuser' , function(){
    
    $result = User::where('id' , 13)->restore();

    if($result)
        return "user restore successfully";
    else    
        return "failed to restore user";
});
