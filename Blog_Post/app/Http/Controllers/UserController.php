<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::withTrashed()->latest()->get();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        // $this->authorize('view', $user);

        $roles = Role::all();
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        #UserPolicy use

        $this->authorize('view', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        if ($request->file('avatar')) {
            $request->file('avatar')->storeAs('images', $request->file('avatar')->getClientOriginalName());
            $user->avatar = $request->file('avatar')->getClientOriginalName();
        }

        $user->update();
        return redirect()->route('users.show', $user)->with('user_update_success', "Profile Update Successully");
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('user-delete-success', "User Deleted Successfully");
    }

    public function attachRole(User $user){

        $user->roles()->attach(request('role'));
        
        toastr()->success('Role Attach Successfully');

        return back();

        // return back()->with('role_attach_success' , "Role Attach Successfully");
        
    }

    public function detachRole(User $user){

        $user->roles()->detach(request('role'));

        toastr()->success('Role Detach Successfully');

        return back();

        // return back()->with('role_detach_success' , "Role Detach Successfully");

    }
}
