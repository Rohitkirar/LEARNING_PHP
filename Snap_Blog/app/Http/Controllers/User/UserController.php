<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Follower;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function dashboard()
    {
        try {
            $posts = Post::whereHas("user")
                    ->with([
                        "user",
                        "user.image",
                        "likes" => function ($query) {
                            return $query->withTrashed()->where("user_id", "=", Auth::id());
                        },
                        "images"
                    ])
                    ->withCount(["likes", "comments"])
                    ->latest()->simplePaginate(10);

            $users = User::where("id" , "!=" , Auth::id())->limit(5)->get();

            // $friendRequests =  Follower::create([
            //     "user_id" => "9c2014c3-6c80-42ba-9a50-d32788d9cd75"  , 
            //     "follower_id" =>  "9c20148a-9e97-417b-8ab7-48c20f034ca6" ,  
            //     "type"=>"follower" 
            // ]);

            $friendRequests = Follower::with("user")->where("type" , "follower")->where("is_accepted" , false)->where("user_id" , Auth::id())->get();

            Debugbar::addMessage($posts);
            debugbar()->addMessage($posts);
            debugbar()->error(Auth()->user());

            return view("user.dashboard", compact("posts" , "users" , "friendRequests"));

        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("home");
        }
    }

    public function show(User $user)
    {
        try {

            $user = $user->load(["image" , "posts" , "posts.images"])
                        ->loadCount([
                            "followers"=>function($query){
                                return $query->where("type" , "follower");
                            }, 
                            "posts"
                        ]);

            debugbar()->addMessage($user);

            return view("user.users.show", compact('user'));
        
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.dashboard");
        }
    }

    public function edit(User $user)
    {
        try {
            return view("user.users.edit", compact('user'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $file = $request->file('profile');

            DB::transaction(function () use ($user, $file) {
                if ($user->isDirty())
                    $user->save();
                if ($file) {
                    $user->image ? $image = $user->image : $image = new Image();
                    $image->url = $file->store("uploads", "public");
                    $user->image()->save($image);
                }
            });
            toastr("User updated successfully");
            return redirect()->route("users.show", $user->id);

        } catch (Exception $e) {
            toastr($e->getMessage() , 'error');
            return redirect()->route("users.index");
        }
    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            toastr("User deleted successfully");
            return redirect()->route("home");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("home");
        }
    }

    // public function addfollowing(){
    //     $following = new Follower();
    //     $following->user_id =  Auth::id();
    //     $following->follower_id = request('user_id');
    //     $following->type = "following" ;
    //     if($following->first())
    //         $following->save();

    //     debugbar()->addMessage($following->first());
    
    // }

    // public function removefollowing(){

    // }
}
