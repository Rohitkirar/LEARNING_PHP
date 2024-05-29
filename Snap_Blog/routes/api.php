<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\PostResourceController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserResourceController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware("basicAuth")->group(function () {

    Route::get("/postsData", function (){
        return response()->json(
            [
                "posts" => Post::limit(10)->get(),
                "user" => Auth::user(),
                "status" => true,
                "status_code" => 200
            ],
            200
        );
    });
});

Route::middleware("authKey")->group(function () {

    Route::post("login", [AuthController::class, 'login']);
    
    Route::post("register", [AuthController::class, 'register']);

    // Create Sanctum Token

    Route::post("loginSanctum", [AuthController::class, 'loginSanctum']);
});



Route::middleware("auth:sanctum")->group(function () {

    Route::get("comments", function () {
        $comments = Comment::get();

        return response()->json(
            [
                "comments" => $comments,
                "user" => Auth::user(),
                "status" => true,
                "status_code" => 200
            ],
            200
        );
    });
});


Route::middleware('auth:api')->group(function () {

    Route::post("logout", [AuthController::class, 'logout']);

    //users routes

    Route::get("/users", [UserController::class, 'index']);
    Route::post("/users", [UserController::class, 'store']);
    Route::get("/users/{user}", [UserController::class, 'show']);
    Route::match(["put", "patch"], "/users/{user}", [UserController::class, 'update']);
    Route::delete("/users/{user}", [UserController::class, 'destroy']);

    // posts routes
    
    Route::get("/posts", [PostController::class, "index"]);
    Route::post("/posts", [PostController::class, "store"]);
    Route::get("/posts/{post}", [PostController::class, "show"]);
    Route::match(["put", "patch"], "/posts/{post}", [PostController::class, "update"]);
    Route::delete("/posts/{post}", [PostController::class, "destroy"]);


    // Route::apiResource("users" , UserController::class);


});


// users 

Route::get("/resource/users" , [UserResourceController::class , "index"] );

Route::get("/resource/users/{user}" , [UserResourceController::class , "show"] );

Route::get("/collection/users" , [UserResourceController::class , "collectionIndex"]);

// posts

Route::get("/resource/posts" , [PostResourceController::class , "index"] );

Route::get("/resource/posts/{post}" , [PostResourceController::class , "show"] );

Route::get("/collection/posts" , [PostResourceController::class , "collectionIndex"]);