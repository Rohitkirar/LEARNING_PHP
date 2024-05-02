<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        
       if($user->roles()->pluck('slug')->contains('admin'))
            return true;
        else
            return false;
    }


    public function view(User $user, User $model)
    {
        if($user->roles()->pluck('slug')->contains('admin'))
            return true;

        return ($user->id === $model->id);
        // return ($user == $model);
    }

   
    public function create(User $user)
    {
        //
    }

   
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

   
    public function delete(User $user, User $model)
    {
        if($user->roles()->pluck('slug')->contains('admin'))
            return true;

        return $user->id === $model->id;
    }

    
    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}
