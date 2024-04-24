<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except(["create" , "store"]);
    }

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {

        $result = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'number' => $request['number'],
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);

        if ($result)
            return view('common.login');
        else
            return view('users.register');
    }

    public function show($id)
    {
        $user = User::with('posts.comments', 'posts.category', 'posts.likes')->find($id);
        

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $user = User::find($id);

        if (true) {

            $result = $user->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'date_of_birth' => $request['date_of_birth'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'number' => $request['number']
            ]);

            if ($result)
                return view('users.index');
        }

        return redirect(route('users.edit', $id));
    }

    public function destroy($id)
    {
        if (User::destroy($id))
            return redirect('/');
    }
}
