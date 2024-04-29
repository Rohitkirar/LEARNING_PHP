<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    #relationship

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

}
