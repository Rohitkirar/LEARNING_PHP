<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Category;
use App\Models\Student;
use App\Models\Course;
use App\Models\PostComment;
use App\Models\Product;
use App\Models\Shop;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/' ,  'home'); 

Route::view('/about' ,  'about');

// Route::get('/users/create' ,  [UserController::class , 'create']); //already created in resource route

Route::view('/login' ,  'common.login');

// inserting data by using create in student , course table

Route::get('/createstudent' , function(){

    $result = Student::create(['full_name'=>'Hariom' , 'number' => 1]);
    if($result)
        return "data inserted successfully";

});

Route::get('/createcourse' , function(){

    $result = Course::create(
        [ 'name'=>'Science' ]
    );

    if($result)
        return "data inserted successfully";

});

// Many To Many Relationship Using Student - Course Model (pivot table : course_student)

Route::get('/studentcoursedata' , function(){

    $result = Student::with('courses')->find('02bd680d-f897-11ee-b4dc-fc3fdb8b48eb');

    return $result;
});

Route::get('/coursestudentdata' , function(){

    $result = Course::with('students')->find('9bc9acc2-57f5-4c12-83fb-2941c18facee');

    return dd($result);
    // return $result->exists;
});


// Many To Many Relationship using Product - Shop Model (pivot table : product_shop)

Route::get('/productshopdata' , function(){

    $result = Product::with('shops')->find(4);
    return $result;

});

Route::get('/shopproductdata' , function(){

    $result = Shop::with('products')->find(3);
    return $result;

});

// hasManyThrough() b/w USER - PostImage through Post model 

Route::get('/userimagedata'  , function(){
    
    $userImageData = User::with('images')->find(9);

    dd($userImageData['images'][0]);
});

#hasManyThrough() b/w Category - PostComment through Post model  

Route::get('/categorycommentdata' , function(){

    $categoryCommentData = Category::with('comments')->find(11);

    dd($categoryCommentData);

});

// hasManyThrough() b/w Category - PostLike through Post model

Route::get('/categorylikedata' , function(){

    $categoryLikeData = Category::with('likes')->find(11);

    dd($categoryLikeData);

});

// morphOne() to find image of User From Image table

Route::get('/userImage' , function(){

    $userImage = User::with('image')->find(9);

    dd($userImage);

});

//morphOne() to find image of Category From Image table

Route::get('/categoryImages' , function(){
    
    // $categoryImage  = Category::with('image')->find(11);

    $categoryImage  = Category::with('image')->find(12);
    dd($categoryImage);
});

// morphMany() to find images of Post From Image table

Route::get('/postImages' , function(){

    // $postImages = Post::with('images')->find(28);
    $postImages = Post::with('images')->find(27);
    
    dd($postImages);

});

// to access the parent of imageable

Route::get('/imageParent/{id}' , function($id){
    
    $parent = Image::find($id)->imageable;
    
    echo ($parent);
})



?>

