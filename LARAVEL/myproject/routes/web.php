<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

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



Route::get('/', function () {
    return view('welcome');
});

// redirecting to index view

Route::get('/index' , function(){
    return view('index');
});

Route::get('/index{text}' , function($text){
    return "<h3>Route::get('/index{text}' , function(\$text){});  $text</h3>";
});

Route::get('/index/{text}' , function($text){
    return "<h3>Route::get('/index/{text}' , function(\$text){}); $text</h3>";
});

// default variable setup
Route::get("/output/{text?}" , function($text=null){
    if($text)
        echo "<h3>Route::get('/index/{text}' , function(\$text = null){}); $text</h3>";
    else
        echo "<h3>Route::get('/index/{text}' , function(\$text = null){}); $text</h3>";
    return "Successfully show data";
});

// naming the route url

Route::get("/index/contact/about/mail" , ["as" => "index.mail" , function(){
    echo route('index.mail');
}]);

Route::get("user/main/view" , function(){
    echo route('user.view');
})->name('user.view');

/** 

// redirect is used to redirect another route

Route::redirect('/index' , '/output');

Route::get("/index" , function(){
    return redirect("/output");
});

// any is used to route when request come from any method it will route

*/

Route::any('/userdashboard' , function(){
    echo "any route method call(get , post , delete , put , patch , options)";
});

// get data by get method from form

Route::get('/showformdata' , function(){

    if(isset($_GET['submit'])){
        
        echo "route::get('/showformdata' , function(){})";

        print_r( $_GET );
        echo  "<a href='/index' >index</a>";
    }
    else
        return "No Data Found";

});

Route::get('/showformdata?{first_name}&{last_name}&{submit}' , function($first_name , $last_name , $submit){

    echo "$first_name $last_name $submit";

});  //invalid approach

// get data by post method using csrf_field() in form

Route::post('/showformdata' , function(){

    if(isset($_POST['submit'])){

        echo "route::post('/showformdata' , function(){})";

        print_r( $_POST );
        echo  "<a  href='/index' >index</a>";
    }
    else
        return "No Data Found";
});

// Route::match() method 

Route::match(['GET' , 'POST'] , '/showformdata2' , function(){
    if(isset($_POST['submit'])){
        echo "route::match(['GET' , 'POST'] , '/showformdata' , function(){})";

        print_r( $_POST );
        echo  "<a  href='/index' >index</a>";
    }
    elseif(isset($_GET['submit'])){
        echo " <h1> {$_GET['first_name']}  {$_GET['last_name']} </h1>";
        echo "<pre>" ;
            print_r( $_GET );
        echo  "</pre><a href='/index' >index</a>";
    }
    else
        return "No Data Found";
});
/** 

// calling a controller by routes (use backslash only)

// 1 st way

route::get('/usercontroller' , "App\Http\Controllers\UserController@index");

// 2nd way


route::get('/usercontroller/{name}' , [UserController::class , "index"]);



// create route by calling resource static method 

route::resource('/usercontroller' , "\App\Http\Controllers\UserController");

route::resource('/usercontroller' , "\App\Http\Controllers\UserController");

*/

// passing value to view

Route::get("index/{first_name}/{last_name}" , function(){
    return view('index');
});


// Route::view('/index' , 'index' );

Route::get('index/{num1}/{num2}' , function($num1 , $num2){
    return "the num1 and num2 is a 3 digit number";
})->where(['num1' => '[0-9]{3}' , 'num2' => '[0-9]{3}'] );

Route::get('index/{num1}/{num2}/{num3}' , function($num1 , $num2 , $num3){
    return "the num1 and num2 is a 3 digit number and num3 is equal to 100";
})->where(['num1' => '[0-9]{3}' , 'num2' => '[0-9]{3}'  ,'num3' => '100' ]);

Route::get('index/{num1}/{num2}/{num3}' , function($num1 , $num2 , $num3){
    return "$num1 / $num2 / $num3";
})->whereNumber('num1')->whereAlpha( 'num2')->whereAlphaNumeric('num3');

// Route::get('user/{id}' , function($id){
//     return "the user is a valid user with id number : $id";
// })->whereIn('id' ,  [100 ,102 ,103]);

//post controller calling
Route::get('post/' , function(){
    return "post Home page";
});
Route::get('post/{id}/{name}' , "\App\Http\Controllers\PostController" );

/** 

Route::get('contact' , function(){

    // calling controller static method

    return UserController::contact("ROHIT KIRAR" , "1234567890");

    // 2nd way to call a non static controller method

    $user = new UserController(); 

    return $user->contact("ROHIT KIRAR" , "1234567890" ) ;

});

*/

//resource route 

route::resource('/usercontroller' , "\App\Http\Controllers\UserController");

/** 

Route::resource('/user_s' , "\App\Http\Controllers\UserController" )->only([
    'index' , 'create' , 'store' , 'show'
]);

Route::resource('user_s' , UserController::class)->except([
    'edit' , 'update'
]);

*/

// raw sql query 

Route::post('/insert'  , function(){
    $result = 
    DB::insert(
        "INSERT INTO usersdata 
                (first_name , last_name , email , number) 
        VALUES  (? , ? , ? , ?);" , 
        [$_POST['first_name'] , $_POST['last_name'] , $_POST['email'] , $_POST['number']]
    );

    if($result){
        return redirect('/showdata');
    }
    else{
        return redirect('/');
    }
        
});

Route::match( ['POST' , 'GET'] , '/showdata/{id?}' , function($id=null){
    if($id){
        return DB::select(
            "SELECT * FROM usersdata WHERE id = ?;",
            [ $id ]
        );
    }
    else{
        return DB::select(
            "SELECT * FROM usersdata;"
        );
    }   
});

Route::POST('/update/{id}' , function($id){
    $result =  
    DB::update(
        "UPDATE usersdata 
        SET first_name = ? ,
            last_name = ?,
            email = ?  ,
            number = ? 
        WHERE id = ? ;  
        " , 
        [$_POST['first_name'] , $_POST['last_name'] , $_POST['email'] , $_POST['number'] , $id ]
    );

    if($result){
        return redirect("/showdata/$id");
    }else{
        return redirect('/');
    }
});

Route::get('/delete/{id}' , function($id){
    $result = 
    DB::delete(
        "DELETE FROM usersdata WHERE id = ?;" , 
        [$id]
    );
    if($result)
        return "data with id : $id deleted successfully";
    else
        return "No data available with this id : $id";
});

Route::get('/insert' , function(){
    $result = DB::insert(
        "INSERT INTO posts (title , content) 
        VALUES
            ('post1' , 'hello everyone') , 
            ('post2' , 'good morning everyone'),
            ('post3' , 'good afternoon everyone'),
            ('post4' , 'good evening everyone'),
            ('post5' , 'good night everyone')
        ");
        if($result)
            return "Data inserted successfully!";
        else
            return "failed to insert data!";
});

Route::get('/getpostdata' , function(){
    $postData = Post::all();
    return $postData;
});

Route::get('/getpostdatawhere' , function(){
    $result = Post::where('id' , 2)->get();
    return $result;
});
Route::get('/getpostdatafind' , function(){
    
    // $result = Post::find(1);

    $result = Post::find([1 , 2 , 3]);
    
    return $result;
});
Route::get('/insertpost' , function(){

    $post = new Post;

    $post->title = 'laravel';

    $post->content = 'learning laravel framework for php';
    
    $result = $post->save();
    
    if($result)
        return "data inserting in table successfullly";

    else
        return "failed to insert data in table;";

});

// insert data by using create (mass assingment)

Route::get('/insertpost2' , function(){
    // $result = Post::create(['title'=>'java' , 'content'=>'Java is a high level programming language']);
    $result = Post::create(['title'=>'java' , 'content'=>'Java is a high level programming language' , 'created_at'=>'2024-04-05']);
    if($result)
        return "insert data by create successfully";
    else
        return "failed to store data by create";
});

Route::get('/updatepost/{id}' , function($id){

    //1st way of updating records

    $result = Post::find($id)->update(['title'=>'php3' , 'content'=>"php3 content" ]);

    if($result)
        return "successfully updated data";
    else
        return "failed to update data";


    // 2nd way of updating records
/* 

    $post = Post::find($id);
    $post->title = 'PHP2';
    $post->content = 'PHP is a server-side scripting language';
    $post->created_at = '2024-04-01';
    $result = $post->save();

    if($result)
        return "successfully updated data";
    else
        return "failed to update data";

*/
});


Route::get('/updatepost2' , function(){
    $post = new Post;
    $result = $post->where('id' , 2)->where('title' , 'post2')->update(['title'=>'Javascript' , 'content'=>'javascript is a client side language']);
    if($result)
        return "updated data successfully";
    else
        return "failed to update data";
});

Route::get('/delete' , function(){
    $post = new Post;
    $result = $post->find(2)->delete();
    if($result )
        return "data deleted successfully";
    else
        return "failed to delete data";
});

Route::get('/destroy' , function(){
    $post = new Post;
    // $result = $post->destroy(3);

    // $result = $post->destroy(4,5,6);

    $result = $post->destroy([7,8]);

    if($result)
        return "data deleted successfully!";
    else
        return "failed to delete data";
});

Route::get('/forcedelete' , function(){
    $post = new Post;
    $result = $post->where('id',84)->forceDelete();
    
    if($result)
        return "data deleted successfully!";
    else
        return "failed to delete data";
});

Route::get('/getuserdata' , function(){
    $user = new User;
    $userData = $user->where('id' , '>=' , 10)->limit(10)->get() ;
    return $userData;
});

Route::get('/getdeleteduser' , function(){
    $user = new User;
    $userData = $user->where('id' , '<' , 10)->get();
    return $userData;
});
    