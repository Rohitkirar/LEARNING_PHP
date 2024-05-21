<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $posts = Post::count();
        $comments = Comment::count();
        $likes = Like::count();

        return view("admin.index", compact('users', 'posts', 'comments', 'likes'));
    }

    public function index()
    {
        try {
            if (request()->ajax()) {
                return DataTables::of(User::withTrashed())
                    ->addIndexColumn()
                    ->setRowClass("text-justify")
                    ->editColumn("created_at", function ($user) {
                        return $user->created_at->diffForHumans();
                    })
                    ->editColumn("updated_at", function ($user) {
                        return $user->updated_at->diffForHumans();
                    })
                    ->editColumn("deleted_at", function ($user) {
                        return $user->deleted_at ? $user->deleted_at->diffForHumans() : null;
                    })
                    ->editColumn("username", function ($user) {
                        return '<a href="' . route('admin.users.show', $user->id) . '">' . $user->username . '</a>';
                    })
                    ->editColumn("id", function ($id) {
                        return view('buttons.edit', ['route' => route("admin.users.edit", $id)]);
                    })
                    ->editColumn("deleted_at", function ($user) {
                        return $user->deleted_at ?
                            view("buttons.restore", ["route" => route('admin.users.restore', $user->id)]) :
                            view("buttons.delete", ["route" => route('admin.users.destroy', $user->id)]);
                    })
                    ->rawColumns(['id', 'deleted_at', 'username'])
                    ->make();
            }
            return view("admin.users.index");
        } catch (Exception $e) {
            toastr($e->getMessage(), "error");
            return redirect()->route("home");
        }
    }


    public function create()
    {
        return view("admin.users.create");
    }


    public function store(CreateUserRequest $request)
    {
        try {
            User::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "birth_date" => $request->birth_date,
                "gender" => $request->gender,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "username" => $request->username,
                "password" =>  $request->password,
            ]);
            toastr("User Created Success");
            return redirect()->route("admin.users.index");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("admin.dashboard");
        }
    }


    public function show($id)
    {
        try {
            $user = User::with("posts")->withTrashed()->find($id);
            return view("admin.users.show", compact('user'));
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("admin.dashboard");
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

            if ($user->isDirty()) {
                $user->save();
                toastr("User updated successfully");
            } else
                toastr("No changes to Update ", "warning");

            return redirect()->route("users.show", $user->id);
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
            return redirect()->route("admin.users.index");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("home");
        }
    }

    public function restore($id)
    {
        try {
            User::withTrashed()->find($id)->update(['deleted_at' => null]);
            toastr("User Restored successfully");
            return redirect()->route("admin.users.index");
        } catch (Exception $e) {
            toastr($e->getMessage());
            return redirect()->route("home");
        }
    }
}
