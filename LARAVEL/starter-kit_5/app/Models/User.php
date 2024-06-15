<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

     protected $guarded = ['id'];

     public $path = "storage/uploads/profile/" ;
     protected $demoAvatar = "assets/img/avatars/14.png";
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at'=> 'datetime' ,
        'deleted_at'=> 'datetime',
    ];

    #-----------------------------Relationships--------------------------------------
    public function posts(){
        return $this->hasMany(Post::class);
    }
    

    #-----------------------------Accessor&Mutators-----------------------------------

    public function avatar():Attribute{
        return new Attribute(
            get: fn($avatar) => $avatar ? asset($this->path . $avatar) :  asset($this->demoAvatar),
            set: fn($avatar) => basename($avatar)
        );
    }
    public function password():Attribute{
        return new Attribute(
            set: fn($password) => bcrypt($password)
        );
    }

    public function firstName():Attribute{
        return new Attribute(
            get: fn($first_name) => ucfirst($first_name),
            set: fn($first_name) => strtolower($first_name)
        );
    }

    public function lastName():Attribute{
        return new Attribute(
            get: fn($last_name) => ucfirst($last_name),
            set: fn($last_name) => strtolower($last_name)
        );
    }

    #-----------------------------UserDefinedFunction-----------------------------------

    public function fullName(){
        return $this->first_name . " " . $this->last_name;
    }
}
