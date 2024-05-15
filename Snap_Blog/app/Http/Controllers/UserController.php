<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        try {
            $users = User::limit(10)->get();
            $posts = Post::with("images")->latest()->limit(10)->get();
            return view("users.index", compact("users", "posts"));
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("home");
        }
    }


    public function create()
    {
    }


    public function store()
    {
    }

    public function show($id)
    {
        try {
            $user = User::with("posts")->first();
            return view("users.show" , compact('user'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }

    public function edit(User $user)
    {   
        try {
            return view("users.edit", compact('user'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }

    public function update(UpdateUserRequest $request , User $user)
    {
        try {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;

            if($user->isDirty()){
                $user->save();
                toastr("User updated successfully");
            }else
                toastr("No changes to Update " , "warning");
                
            return redirect()->route("users.show" , $user->id);
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("users.index");
        }
    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            toastr("User deleted successfully");
            return redirect()->route("home");
        }catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("home");
        }
    }
}
