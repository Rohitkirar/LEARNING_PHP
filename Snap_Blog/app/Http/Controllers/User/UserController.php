<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
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
        // try {
            $posts = Post::whereHas("user")
                ->with([
                    "user",
                    "likes" => function ($query) {
                        return $query->withTrashed()->where("user_id", "=", Auth::id());
                    },
                    "images"
                ])
                ->withCount(["likes", "comments"])
                ->latest()->simplePaginate(10);

            Debugbar::addMessage($posts);
            debugbar()->addMessage($posts);
            debugbar()->error(Auth()->user());

            return view("user.users.index", compact("posts"));
        // } catch (Exception $e) {
        //     toastr($e->getMessage(), "error");
        //     return redirect()->route("home");
        // }
    }

    public function show($id)
    {
        try {
            $user = User::with("posts")->find($id);
            return view("user.users.show", compact('user'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
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
}
