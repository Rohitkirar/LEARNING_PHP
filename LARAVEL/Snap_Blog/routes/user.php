<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\PostController;
    use App\Models\User;
    use App\Models\PostImage;
use Illuminate\Support\Facades\DB;

    Route::resource('/users' , UserController::class);

    Route::resource('/posts' , PostController::class);

    Route::view('/updatepassword' , 'user.updatepassword');

    Route::get('user/image' , function(){
        $postImages = User::find(9)->postImages; 
        dd($postImages[15]);
    });

    Route::get('image/user' , function(){
        $user = PostImage::find(3)->user;
        dd($user);
    });
    
    // Route::get('/user/create' , function(){
    //     // $user = User::create(['first_name'=>'rohit' , 'last_name'=>'rohit2' , 'date_of_birth' => '0000-00-00' , 'email'=>""]);

    //     dd($user);
    // });
?>