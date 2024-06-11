<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/profile/getDataTable', [ProfileController::class, 'getDataTable'])->name('profile.getDataTable');

// users routes

Route::get("/users", [UserController::class, "index"])->name("users.index");

// categories routes

Route::get("/categories", [CategoryController::class, "index"])->name("categories.index");

// posts routes

Route::get("posts", [PostController::class, "index"])->name("posts.index");

Route::delete("posts/{post}/destroy", [PostController::class, "destroy"])->name("posts.destroy");

Route::patch("posts/{post}/restore", [PostController::class, "restore"])->name("posts.restore");


use Yajra\DataTables\Facades\DataTables;

Route::get("users1" , function(){
    return DataTables::of($user = User::query())
        ->only(['first_name' , 'last_name' , "status" , "is_deleted" , 'deleted_at' , "hii"])
        ->editColumn("created_at" , function($user){
            return $user->created_at->diffForHumans();
        })
        ->editColumn("status" , "inactive")
        ->addColumn("is_deleted" , "0")
        ->addColumn("first_name" , "ROHITKIRAR")
        ->addColumn("deleted_at" , "updated")
        ->setRowData(["working" => "true"])
        ->setRowAttr(["name"=>"main" , "class"=>"bg-white border text-sucess"])
        ->setRowId("id")
        ->addIndexColumn()
        ->toJson();
});

Route::get("users2" , function(){
    $user = User::query();
    return DataTables::eloquent($user)
        ->editColumn("created_at" , function($user){
            return $user->created_at->diffForHumans();
        })
        ->only(['first_name' , 'last_name'])
        ->with("usercount" , function() use ($user) {
            return $user->count();
        })
        ->toJson();
});



//  medias 
Route::get("/medias", function () {
    return view("mediaIndex");
});

Route::get("/getMediaData", function () {

    $datatable = DataTables::of(Image::query());
    $datatable->editColumn("imageable_type", '{{ basename($imageable_type) }}');
    return $datatable->make();
})->name("getMediaData");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// datatable post routes


Route::get('/posts1', function (Request $request) {

    if (request()->ajax()) {

        return DataTables::of(Post::with("user")->withTrashed())

            ->addColumn('name', function ($post) {
                return $post->user->getFullName();
            })
            ->addColumn("view", "<a class='btn btn-primary' href='{{route('posts.index')}}'>view</a>")

            ->editColumn("deleted_at", function ($post) {
                return $post->deleted_at ?
                    view("datatables.postRestoreBtn", ['id' => $post->id]) :
                    view("datatables.postDeleteBtn", ['id' => $post->id]);
            })

            ->editColumn("content", '{{Str::limit($content , 50)}}')

            ->editColumn("created_at", function ($post) {
                return $post->created_at->diffForHumans();
            })

            ->editColumn("updated_at", function ($post) {
                return $post->updated_at->diffForHumans();
            })

            ->setRowClass(function ($post) {
                return $post->deleted_at ? "text-danger"  : "text-success";
            })

            ->setRowAttr(['align' => 'center'])

            ->rawColumns(['view', 'deleted_at'])

            ->make();
    }

    return view("posts1");

})->name("post1");


//doubt

// ->editColumn("created_at" , '{{$created_at->diffForHumans()}}' )