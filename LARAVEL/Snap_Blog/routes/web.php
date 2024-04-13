<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use App\Models;


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

//* Route::get('/users/create' ,  [UserController::class , 'create']); //already created in resource route

Route::view('/login' ,  'common.login');

//! inserting data by using create in student , course table

Route::get('/createstudent' , function(){

    $result = Models\Student::create(['full_name'=>'Hariom' , 'number' => 1]);
    if($result)
        return "data inserted successfully";

});

Route::get('/createcourse' , function(){

    $result = Models\Course::create(
        [ 'name'=>'Science' ]
    );

    if($result)
        return "data inserted successfully";

});

//! Many To Many (i.e. belongsToMany()) Relationship Using Student - Course Model (pivot table : course_student)

Route::get('/studentcoursedata' , function(){

    $result = Models\Student::with('courses')->find('02bd680d-f897-11ee-b4dc-fc3fdb8b48eb');

    return $result;
});

Route::get('/coursestudentdata' , function(){

    $result = Models\Course::with('students')->find('9bc9acc2-57f5-4c12-83fb-2941c18facee');

    return dd($result);
    //* return $result->exists;
});


//! Many To Many (i.e. belongsToMany()) Relationship using Product - Shop Model (pivot table : product_shop)

Route::get('/productshopdata' , function(){

    $result = Models\Product::with('shops')->find(4);
    return $result;

});

Route::get('/shopproductdata' , function(){

    $result = Models\Shop::with('products')->find(3);
    return $result;

});

//! hasManyThrough() b/w USER - PostImage through Post model 

Route::get('/userimagedata'  , function(){
    
    $userImageData = Models\User::with('images')->find(9);

    dd($userImageData['images'][0]);
});

//! hasManyThrough() b/w Category - PostComment through Post model  

Route::get('/categorycommentdata' , function(){

    $categoryCommentData = Models\Category::with('comments')->find(11);

    dd($categoryCommentData);

});

//! hasManyThrough() b/w Category - PostLike through Post model

Route::get('/categorylikedata' , function(){

    $categoryLikeData = Models\Category::with('likes')->find(11);

    dd($categoryLikeData);

});

//! morphOne() to find image of User From Image table

Route::get('/userImage' , function(){

    $userImage = Models\User::with('image')->find(9);

    dd($userImage);

});

//! morphOne() to find image of Category From Image table

Route::get('/categoryImages' , function(){
    
    // $categoryImage  = Category::with('image')->find(11);

    $categoryImage  = Models\Category::with('image')->find(12);
    dd($categoryImage);
});

//! morphMany() to find images of Post From Image table

Route::get('/postImages' , function(){

    // $postImages = Post::with('images')->find(28);
    $postImages = Models\Post::with('images')->find(27);
    
    dd($postImages);

});

//! to access the parent of imageable

Route::get('/imageParent/{id}' , function($id){
    
    $parent = Models\Image::find($id)->imageable;
    
    echo ($parent);
});


//! morphToMany() fn of Post Model is used to find the tags related to post by using posts table id

Route::get('/postwithtags/{id}' , function($id){

    $post = Models\Post::with('tags')->find($id);

    return $post ;
    
    // dd($posts);
});

//! morphToMany() fn of Video Model is used to find the tags related to video by using videos table id 

Route::get('/videowithtags/{id}' , function($id){

    $video = Models\Video::with('tags')->find($id);

    return $video;

    dd($video);
});

//! morphedByMany() function  of Tag model is used to find posts and videos related to tag by using tag_id

Route::get('/databytag/{id}'  , function($id){


    //1st approach by calling separately fn

    $tag = Models\Tag::find($id);

    $posts = $tag->posts;

    $videos = $tag->videos;
    
    dump($posts , $videos);


 //! 2nd approach by using with() fn

    $tagwithpostsandvideosData = Models\Tag::with('posts' , 'videos')->find($id);

    dump($tagwithpostsandvideosData) ;

});

//! morphTo() of Taggable Model to find data related to which model by taggable_id

Route::get('/databytaggable/{taggable_id}' , function($taggable_id){

    $data = Models\Taggable::find($taggable_id)->taggable;

    dump($data);

});


//! CRUD operation using ONE TO ONE Relationship

//! ->Create Operation

Route::get("/insertuseraddress" , function(){

    //! 1st approach by using save() by creating UserAddress object
/*     
    $user = Models\User::findorfail(9);

    $address = new Models\UserAddress();
    $address->address = "Sanchi";
    $address->city = "Sanchi";
    $address->state = "Madhya Pradesh";
    $address->country = "India";

    return $user->address()->save($address);
 */

    //! 2nd approach by using save() by createing UserAddress object instialize by assoc arr
/* 
    $user = Models\User::findorfail(10);
    
    $address = new Models\UserAddress([
        'address' => "home no 10",
        'city' => "Muzaffarpur" ,
        'state' => "Bihar",
        'country' => "India"
    ]);
    $result = $user->address()->save($address);

*/ 

    //! 3rd approach by using create() 
/* 
    $user = Models\User::findorfail(11);

    $result = $user->address()->create([
        'address' => "home no 20",
        'city' => "Ahemdabaad" ,
        'state' => "Gujarat",
        'country' => "India"
    ]);
 */
    //! create new user by adding address in user_addresses table

    $result = 
    Models\User::create([
        'first_name' => 'Preeti' ,
        'last_name' => 'Chinta' ,
        'gender' => 'female' ,
        'date_of_birth' => '1994-06-01',
        'email' => 'preetichinta123@gmail.com' ,
        'number' => '1212345623' ,
        'username' => 'preetichinta123' ,
        'password' => '12345678' ,
        ])
        ->address()
        ->create([
            'address' => 'home no : 1' , 
            'city' => 'Mumbai' , 
            'state' => 'Maharastra' ,
            'country' => 'India'
        ]);
  
    return($result);
});

//! Read Operation

Route::get("readuseraddress/{id}" , function($id){

    //! get user details with address

    $userDetails = Models\User::with('address')->findorfail($id);

    return $userDetails;


    //! to get address only
/* 
    $userDetails = Models\User::find($id)->address;
    
    return $userDetails;

*/   
});

//! update 

Route::get('updateuseraddress' , function(){

    $user = Models\User::findorfail(9);
    $result = $user->address->update(['address'=>"new home"]);

    
    //! 2nd way 
/* 
    $return = Models\UserAddress::whereUserId(9)
                ->update([
                    'address' => "home no 5"
                ]);
*/

    return $result;
});

//! delete

Route::get('deleteuseraddress' , function(){
    
    $user = Models\User::findorfail(9);
    
    // $result = $user->address()->delete();

    $result = $user->address()->onlyTrashed()->restore();
    
    return $result;

    // 
});

?>

