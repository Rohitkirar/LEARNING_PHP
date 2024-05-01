<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        
        $roles = Role::all();

        return view("admin.roles.index" , compact('roles'));
    }

    public function store(CreateRoleRequest $request){

        Role::create([
            "name" => ucfirst(strtolower($request->name)) ,
            "slug" => strtolower($request->slug)
        ]);

        toastr('Role Created Successfully!');

        return back();  

    }

    public function edit(Role $role){

        $permissions = Permission::all();

        return view("admin.roles.edit" , compact("role" , "permissions"));

    }

    public function update(UpdateRoleRequest $request , Role $role){

        $role->name = ucfirst(strtolower($request->name));
        $role->slug = strtolower($request->slug);

        if($role->isDirty()){
            $role->save();
            toastr('Role Updated Successfully');
            return redirect()->route('roles.index');
        }
        toastr('No changes in role Data!' , 'warning');
        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        toastr('Role Deleted Successfully!');
        return back();
    }

    public function attachPermission(Role $role){
     
        $role->permissions()->attach(request('permission'));

        toastr('permission attach successfully');

        return back();
    }

    public function detachPermission(Role $role){
     
        $role->permissions()->detach(request('permission'));

        toastr('permission detach successfully');

        return back();
    }
}
