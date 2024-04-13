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


    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'number',
        'username',
        'password' 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){

        return $this->hasOne(UserAddress::class);
        
    }

    public function posts(){
        
        return $this->hasMany(Post::class);
        
        // return $this->hasOne(Post::class);
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function likes(){
        return $this->hasMany(PostLike::class);
    }

    // public function images(){

    //     return $this->hasManyThrough(PostImage::class , Post::class);
    
    // }

    public function image(){
        
        return $this->morphOne(Image::class , 'imageable');

    }


}
