<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\QueryException;
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
    
    // $userImageData = Models\User::with('images')->find(9);
    
    $userImageData = Models\User::find(9);

    return $userImageData->images;

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

Route::get("/readuseraddress/{id}" , function($id){

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

Route::get('/updateuseraddress' , function(){

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

Route::get('/deleteuseraddress' , function(){
    
    $user = Models\User::findorfail(9);
    
    // $result = $user->address()->delete();

    $result = $user->address()->onlyTrashed()->restore(); // to restore deleted data
    
    return $result;

});

//! CRUD Operation One to Many Relationship

//! one to many create opertion

Route::get('/createuserposts'  , function(){

    $user = Models\User::findorfail(60);
    
    //?for single post add

    // return $user->posts()->create(["title"=>"Preeti post" , 'category_id' => 11 , 'content'=>'pretty smile' ]);


    //? for multiple post add

    return $user->posts()->insert([
        ['user_id' => $user['id']  , 'title'=>"preeti post 2 " , 'category_id' => 14 , 'content' => 'pretty 2'],
        ['user_id' => $user['id'] , 'title'=>"preeti post 3 " , 'category_id' => 15 , 'content' => 'pretty 3']
    ]);

});

//! one to many Read operation

Route::get('/readuserposts' , function(){

    // $posts = Models\User::with('posts')->find(60);

    $posts = Models\User::find(60)->posts;

    foreach($posts as $key=>$post)
        echo $post  ."<br>";

});

//! one to many update operation

Route::get('updateuserposts', function(){

    $user = Models\User::findorfail(60);

    $post = $user->posts()->findorfail(119)->update(['title' => 'Kings XI punjab' , 'content'=>'She spent all the parse to buy sharma , virat , dhoni if they come in mega auction']);
    
    return $post;
    
    // if id is not specify it update whole records of posts for user present in db
    
    // $post = $user->posts()->update(['title' => 'Kings XI punjab' , 'content'=>'She spent all the parse to buy sharma , virat , dhoni if they come in mega auction']);

});


//! delete one to many relations

Route::get('deleteuserposts' , function(){

    $user = Models\User::findorfail(60);

    $post = $user->posts()->whereId('122')->delete();
    
    // $post = $user->posts()->delete();
    
    // $post = $user->posts()->withTrashed()->find(122)->restore();

    // $post = $user->posts()->restore();
    
    return $post;

});

//! CRUD operation many to many relationship

//! Create operation on Many to Many relationship

Route::get('/createstudentcourses' , function(){

    $student = Models\Student::find('9bc9a8ae-055f-4794-9fb5-d81d54acef42');

    // return $student->courses()->create( ['name' => 'mathematics' ]);


        // $student = Models\Student::create(['full_name'=>'Rk' , 'number'=> 11]);

        // dump($student);

        // $student->courses()->create(['name' => 'mathematics 2' ]);

        // return $student;
        
    return $student->courses()->whereId('9bc9acc2-57f5-4c12-83fb-2941c18facee')->update(['name'=>'m2']);

});

//! Read operation on Many to Many relationship

Route::get('/readstudentcourses' , function(){

    $student = Models\Student::with('courses')->find('9bc9a8ae-055f-4794-9fb5-d81d54acef42');

    return $student;
});

//! Update operation on Many to Many relationship

Route::get('/updatestudentcourses' , function(){

    $student = Models\Student::find('9bc9a8ae-055f-4794-9fb5-d81d54acef42');

    $course = $student->courses()->whereId('9bcfb6c0-908e-4f8c-bdd1-441f7fb69392')->update(['name' => 'Hindi']);

    // $course = $student->courses()->update(['name' => 'biology2']);

    return $course;

});

//! Delete operation on Many to Many relationship

Route::get('/deletestudentcourses' , function(){
    
    $student = Models\Student::find('9bc9a8ae-055f-4794-9fb5-d81d54acef42');

    return $student->courses()->find('9bc9acc2-57f5-4c12-83fb-2941c18facee')->delete();

    // return $student->courses()->delete(); //?to delete all courses record of student

    // return $student->courses()->onlyTrashed()->find('9bc9acc2-57f5-4c12-83fb-2941c18facee')->restore(); //? to restore record

    // return $student->courses()->restore(); //? to restore record

});


//! createMany() to store multiple data in related model when one to many and many to many relation

Route::get('/createmanycourse' , function(){

    $student = Models\Student::findorfail('9bc9a8ae-055f-4794-9fb5-d81d54acef42');

    $courses = $student->courses()->createMany([
        ['name' => 'BEEE' ] ,
        ['name' => 'ED'],
        ['name' => 'Image Processing']
    ]);

    return $courses;
});

//! saveMany() to store save multiple data in related model when one to many and mant to many relationship

Route::get('/savemanycourse' , function(){

    $student = Models\Student::findorfail('4b3b9671-f898-11ee-b4dc-fc3fdb8b48eb');

    $courses = $student->courses()->saveMany([
        new Models\Course(['name'=>"ED"]) , new Models\Course(['name'=>'BEEE' ]) , new Models\Course(['name'=>'Image Processing'])
    ]);

    return $courses;
});


//! attach , detach  and sync  to add , remove , or both in pivot table for Many to Many relation 

//! attach() : it use to add relation in pivot table


Route::get('/attach' , function(){

    $shop = Models\Shop::find(1);

    // return $shop->products()->attach(2);  //? to add single relation in pivot table

    return $shop->products()->attach([6 , 8 , 9]); //? to insert multiple relation in pivot table 

});


//! detach($id) : it use to remove relation from pivot table

Route::get('/detach' , function (){
    $shop = Models\Shop::find(1);

    // return $shop->products;

    return $shop->products()->detach(8);

    // return $shop->products()->detach(); // to delete all relations in pivot
});


//! sync() : basically it detach all relation and then attach the new one as pass in method

Route::get('/sync' , function(){

    $shop = Models\Shop::find(1);

    return $shop->products()->sync([1 , 2 , 3 ]);

    // return $shop->products;

});


//! CRUD Operation PolyMorphism for morphOne And morphMany

//! Create 
Route::get('/postimagescreate' , function(){

    $post = Models\Post::findorfail(119);
    
    $imageadded = $post->images()->create(['url' => 'pretty.png']);

    return compact('post' , 'imageadded');

});

//! Read 

Route::get('/postimagesread' , function(){

    //? 1st Way 

    $post = Models\Post::find(118);

    foreach($post->images as $image)
        echo $image . "<br>";

    //? 2nd way

    $post = Models\Post::with('images')->find(118);
    dump($post);

    
    //? 3rd way

    $user = Models\User::with('posts.images')->findOrFail(60);

    foreach($user->posts as $post)
        echo $post->images . "<br>";
    
    
});

//! Update '

Route::get('/postimagesupdate' , function(){
    
    $post = Models\Post::find(119);

    $imageboolean = $post->images()->whereId(214)->update(['url'=>'pretty2.png' , 'imageable_id' => 0 ]); // you can only update images that related to post
    
    dd($imageboolean);
    
});

//! Delete

Route::get('/postimagesdelete' , function(){

    $post = Models\Post::find(119);

    return $post->images()->whereId(214)->delete(); // to delte image by id

    return $post->images()->delete();  // to delete all related images 
    
});

Route::get('/assignimagestopost' , function(){

    $post = Models\Post::find(119);

    $image = Models\Image::find(204);

    return $post->images()->save($image); // it update the imageable_id and imageable_type in image table doesn't create new relation

});


Route::get('/unassignimagespost'  , function(){

    $post = Models\Post::find(119);

    return $post->images()->whereId(204)->update(['imageable_id'=>0 , 'imageable_type'=>'']);

});


//! CRUD Operation Many To Many PolyMorphism

//! Create

Route::get('/createpostsvideofortags' , function(){

    $post = Models\Post::create([
        "title" => "The Wonderful Day" ,
        "content" => "beautiful morning , afternoon , evening and night" , 
        "user_id" => 60 , 
        "category_id" => 14
        ]);

    $tag = Models\Tag::find(1);

    dump( $post->tags()->save($tag) );

    // to create a new tag by post or video

    dump($post->tags()->create(['name' => "#work" ]));
    
});

//! Read 

Route::get('/readpostsvideobytags' , function(){

    $tag = Models\Tag::find(2);

    $posts = $tag->posts;

    foreach($posts as $post){
        echo $post . "<hr>";
    }

    $videos = $tag->videos ;

    foreach($videos as $video){
        echo $video . "<hr>";
    }

});

//* read data by Post or Video with tag data

Route::get("/readpostandvideowithtag" , function(){

    $post = Models\Post::findorfail(58);
    
    dump( $post->tags ) ;

    dump(Models\Post::with('tags')->find(58));

    $video = Models\Video::findOrFail(4);

    dump($video->tags);

    dump(Models\Video::with('tags')->find(4));

});

//! Update

Route::get("/updatepostvideowithtag" , function(){

    $post = Models\Post::find(129);

    echo "<HR>"  . $post->tags()->whereId(6)->update(['name'=>'TimetoWork']); 
    

    //* use where to update one tag otherwise it update all tag related to post




    $video = Models\Video::find(3);

    echo "<HR>" . $video->tags()->whereId(2)->update(['name' => 'DreamComesTrue2']);

    //* use where to update one tag otherwise it update all tag related to video




    $tag = Models\Tag::find(3);

    echo "<HR>" . $tag->posts()->whereId(58)->update(['title' => "The Ramayana : Lord Ram" ]);

    //* use where to update one post otherwise it update all post related to tag



    $tag = Models\Tag::with('posts:title' , 'videos')->find(2);
    
    echo "<HR>" . $tag->name;

    echo "<HR>" . $tag->posts()->whereId(27)->update( ['title' =>" Avengers:The Saviour"] );
    
    echo "<HR>" . $tag->posts;

    //* use where to update one post otherwise it update all post related to tag





    echo "<HR>" . $tag->videos()->whereId(3)->update(['url'=>"ROMAN_VS_CODY_Biggest_OF_ALL_TIME.mov"]);

    echo "<HR>" . $tag->videos;

    //* use where to update one video otherwise it update all video related to tag


});


Route::get('/deletepostvideotag' , function(){

    $post = Models\Post::with('tags')->find(27);

    echo "Title : " .$post->title . "<br> Tag : " . $post->tags[0]->name ;

    // echo "<BR>Title Deleted : " . $post->tags()->whereId(2)->delete();



    $video = Models\Video::with('tags')->find(4);

    echo "<br>Url : ". $video->url . "<br> Tag : " . $video->tags[0]->name ;

    // echo "<BR>Video Deleted : " . $video->tags()->whereId(3)->delete();



    $tag = Models\Tag::with('posts' , 'videos')->find(2);
    
    // echo "<BR>post Delete : " . $tag->posts()->whereid(27)->delete();

    // echo "<BR>Video Delete : " . $tag->videos()->whereid(3)->delete();   
});


//! attach() , detach() and sync()

//! attach()

Route::get('/polyattach' , function(){

    //? attach() tags in post

    $post = Models\Post::find(128);

    // $post->tags()->attach(2);

    // $post->tags()->attach([3 , 4, 5]);

    
    //? attach() tags in video

    $video = Models\Video::find(4);

    // $video->tags()->attach(2);

    // $video->tags()->attach([3 , 4, 5]);


    //? attach() posts and videos by tag

    $tag = Models\Tag::find(6);

    // $tag->videos()->attach(4);

    // $tag->posts()->attach(58);

});

//! detach()

Route::get('polydetach' , function(){

    //? detach() tags from post

    $post = Models\Post::find(128);

    // $post->tags()->detach(2);

    // $post->tags()->detach([2,3,4]);

    //? detach() tags from video

    $video = Models\Video::find(4);

    // $video->tags()->detach(3);

    // $video->tags()->detach([3 , 5]);

    //? detach() tags from 

    $tag = Models\Tag::find(6);

    // $tag->posts()->detach(129);

    // $tag->posts()->detach([129 , 128]);

    // $tag->video()->detach(4);

    // $tag->video()->detach([4 , 5 , 1]);

});

//! sync()

Route::get('polysync' , function(){

    //? sync() tags from post

    $post = Models\Post::find(128);

    // $post->tags()->sync(2);

    $post->tags()->sync([2,3,4]);

    //? sync() tags from video

    $video = Models\Video::find(4);

    // $video->tags()->sync(3);

    // $video->tags()->sync([3 , 5]);

    //? sync() tags from 

    $tag = Models\Tag::find(6);

    // $tag->posts()->sync(129);
    
    // $tag->posts()->sync([129 , 128]);

    // $tag->video()->sync(4);

    // $tag->video()->sync([4 , 5 , 1]);

});

//! associate and dissociate  (belongsTo , morphTo);

Route::get('/associate' , function(){
    
});





?>

