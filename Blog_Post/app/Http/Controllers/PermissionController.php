<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permissions\CreatePermissionRequest;
use App\Http\Requests\Permissions\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        
        $permissions = Permission::all();

        return view("admin.permissions.index" , compact('permissions'));
    }

    public function store(CreatePermissionRequest $request){
        Permission::create([
            "name" => ucfirst(strtolower($request->name)),
            "slug" => strtolower($request->slug)
        ]);

        toastr('Permission Created Successfully!');

        return back();

    }
    
    public function edit(Permission $permission){

        return view("admin.permissions.edit" , compact("permission"));
    }

    public function update(UpdatePermissionRequest $request , Permission $permission){

        $permission->name = ucfirst(strtolower($request->name));
        $permission->slug = strtolower($request->slug);

        if($permission->isDirty()){
            $permission->save();
            toastr("Permission Updated Successfully!");
            return redirect()->route("permissions.index");
        }
        
        toastr("No changes To Update Permission!" , "warning");
        
        return back();
    }
    
    public function destroy(Permission $permission){

        $permission->delete();

        toastr("Permission Deleted Successfully!");

        return back();

    }

}
