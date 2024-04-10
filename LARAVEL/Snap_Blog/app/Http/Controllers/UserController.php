<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('user.user' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userData = $request->all();
        dd($userData);
        array_slice($userData , 1 , -1);

        $result = User::create($userData);
        
        if($result)
            return view('common.login');
        else
            return view('common.register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    /*      
        // hasOne() 
        $postData = User::first()->posts;
        return ($postData) ; 
 
        // hasMany() (only get post data) 
        $postData = User::first()->posts()->get(); 
        $postData = User::find($id)->posts;
        return dd($postData) ; 
    */
        //hasMany() (with())
        $user = User::find($id)->with('posts')->get();
        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = User::find($id);
        
        return view('user.editUserDetails' , compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $userData =  $request->all();

        array_slice($userData , 2 , -1);

        $result = User::find($id)->update($userData);

        if($result)
            return redirect('user/');
        else
            return redirect('/user/$id/edit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
