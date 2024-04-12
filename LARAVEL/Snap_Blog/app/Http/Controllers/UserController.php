<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.user');
    }

    public function create()
    {

        return view('common.register');
    }

    public function store(Request $request)
    {
        $userData = $request->all();
        array_slice($userData, 1, -1);

        $result = User::create($userData);

        if ($result)
            return view('common.login');
        else
            return view('common.register');
    }

    public function show($id)
    {
        //hasMany() (with())

        $user = User::with(['posts.comments', 'posts.category', 'posts.likes'])->find($id);

        $user = $user->toJson();

        return view('user.profile', compact('user'));


        /*      
        // hasOne() 
        $postData = User::first()->posts;
        return ($postData) ; 
 
        // hasMany() (only get post data) 
        $postData = User::first()->posts()->get(); 
        $postData = User::find($id)->posts;
        return dd($postData) ; 
        */
    }

    public function edit($id)
    {
        $userData = User::find($id);

        return view('user.editUserDetails', compact('userData'));
    }

    public function update(Request $request, $id)
    {

        $userData =  $request->all();

        array_slice($userData, 2, -1);

        $result = User::find($id)->update($userData);

        if ($result)
            return redirect('/user');
        else
            return redirect('/user/$id/edit');
    }

    public function destroy($id)
    {
        //
    }
}
