<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserListController extends Controller
{
    public function __invoke(){
        
        if(request()->ajax()){

            $users = User::where("is_admin" , "!=" , 1)->withTrashed();
            
            return DataTables::of($users)
            ->editColumn("avatar" , function($user){
                return view('datatables.views.avatar' , ["avatar"  => $user->avatar]);
            })
            ->editColumn("created_at" , function($user){
                return $user->created_at->diffForHumans();
            })
            ->editColumn("deleted_at" , function($user){
                return $user->deleted_at ? "Inactive" : "Active";
            })
            ->addColumn("action" , function($user){
                return view("datatables.views.users.action" , ['user' => $user]);
            })
            ->addIndexColumn()
            ->toJson();
        }
        
        return view("admin.users.index" );
    }
}
