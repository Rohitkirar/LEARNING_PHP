<?php

use Illuminate\Support\Facades\Route;

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

// redirect is used to redirect another route

// Route::redirect('/index' , '/output');

// Route::get("/index" , function(){
//     return redirect("/output");
//});

// any is used to route when request come from any method it will route

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
// Route::get('/showformdata?{first_name}&{last_name}&{submit}' , function($first_name , $last_name , $submit){

//     echo "$first_name $last_name $submit";

// });  //invalid approach

//get data by post method using csrf_field() in form

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


// calling a controller by routes (use backslash only)

// 1 st way

// route::get('/usercontroller' , "App\Http\Controllers\UserController@index");

// 2nd way
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;

// route::get('/usercontroller/{name}' , [UserController::class , "index"]);



// create route by calling resource static method 

// route::resource('/usercontroller' , "\App\Http\Controllers\UserController");

route::resource('/usercontroller' , "\App\Http\Controllers\UserController");

// passing value to view

// Route::get("index/{first_name}/{last_name}" , function(){
//     return view('index');
// });



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

Route::get('user/{id}' , function($id){
    return "the user is a valid user with id number : $id";
})->whereIn('id' ,  [100 ,102 ,103]);

//post controller calling
Route::get('post/' , function(){
    return "post Home page";
});
Route::get('post/{id}/{name}' , "\App\Http\Controllers\PostController" );

Route::get('contact' , function(){

    // calling controller static method

    return UserController::contact("ROHIT KIRAR" , "1234567890");

    //2nd way to call a non static controller method

    // $user = new UserController(); 

    // return $user->contact("ROHIT KIRAR" , "1234567890" ) ;

});