<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
  public function index()
  {
    if (request()->ajax()) {
      $users = User::select('*')
        ->selectRaw('Concat(first_name ," " , last_name) as name ')
        ->where('is_admin', '!=', 1)
        ->withTrashed();

      return DataTables::of($users)
        ->setRowClass('align-center')
        ->editColumn('avatar', function ($user) {
          return view('datatables.views.avatar', ['avatar' => $user->avatar]);
        })
        ->editColumn('created_at', function ($user) {
          return $user->created_at->diffForHumans();
        })
        ->editColumn('deleted_at', function ($user) {
          return $user->deleted_at ? 'Inactive' : 'Active';
        })
        ->addColumn('action', function ($user) {
          return view('datatables.views.users.action', ['user' => $user]);
        })
        ->addIndexColumn()
        ->toJson();
    }

    return view('admin.users.index');
  }

  public function create()
  {
  }
  public function store()
  {
  }
  public function show($id)
  {
    try {
      $user = User::withTrashed()->findOrFail($id);
      return view('admin.users.show', compact('user'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again later', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function edit($id)
  {
    try {
      $user = User::withTrashed()->find($id);
      return view('admin.users.edit', compact('user'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again later', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function update(UserUpdateRequest $request, $id)
  {
    try {
      $user = User::withTrashed()->findOrFail($id);
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
      $user->gender = $request->gender;
      $user->birth_date = $request->birth_date;
      $user->phone_number = $request->phone_number;
      $user->bio = $request->bio;
      if ($request->avatar) {
        if (file_exists($user->path . basename($user->avatar))) {
          unlink($user->path . basename($user->avatar));
        }
        $user->avatar = $request->avatar->store('uploads/profile', 'public');
      }
      if ($user->isDirty()) {
        $user->save();
        toastr('User Profile Updated Successfully', 'success');
        return redirect()->back();
      }
      toastr('No Changes to Update Profile', 'warning');
      return redirect()->back();
    } catch (Exception $e) {
      toastr('Something went wrong, please try again later', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function destroy($id)
  {
    try {
      $user = User::findOrFail($id)->delete();
      toastr('User deleted successfully');
      return redirect()->back();
    } catch (Exception $e) {
      toastr('Something went wrong, please try again later', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
}
