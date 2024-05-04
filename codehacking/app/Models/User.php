<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    #class properties

    protected $guarded = ['id'];

    protected $path = "storage/images/";

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #relationship 

    public function roles(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function image(){
        return $this->morphOne(Image::class , "imageable");
    }

    #accessor

    public function getProfileImage($image){
        if(is_null($image))
            return asset($this->path."userProfile.png");
        
        return $image->image;
    }
    
}
