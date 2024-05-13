<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){

        if(request()->ajax()){
            return DataTables::of(User::query())

            ->editColumn("created_at" , function($user){
                return $user->created_at->diffForHumans();
            })
            ->editColumn("updated_at" , function($user){
                return $user->updated_at->diffForHumans();
            })
            ->addColumn("action" , function($user){
                return '<a class="btn btn-primary" href="/posts/' . $user->id . '/user" >View</a>' ;
            })
            ->make();
        }
        return view("users.index");
    }
}
