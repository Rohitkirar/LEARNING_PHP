<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(Request $request)
    {

        return $request;

        $result = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'number' => $request['number'],
            'username' => $request['username'],
            'password' => md5($request['password'])
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

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->password == md5($request->password)) {

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
