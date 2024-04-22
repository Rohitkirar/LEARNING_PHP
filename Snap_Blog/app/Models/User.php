<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


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

    public function images(){

        return $this->hasManyThrough(PostImage::class , Post::class);
    
    }

    public function image(){
        
        return $this->morphOne(Image::class , 'imageable');
    
    }

    //accessor
    public function getFirstNameAttribute($first_name){
        return ucfirst($first_name);
    }

    public function getLastNameAttribute($last_name){
        return ucfirst($last_name);
    }


    //mutators

    public function setFirstNameAttribute($first_name){
        $this->attributes['first_name'] = strtolower($first_name);    
    }

    public function setLastNameAttribute($last_name){
        $this->attributes['last_name'] = strtolower($last_name);
    }
    
    public function setEmailAttribute($email){
        $this->attributes['email'] = strtolower($email);
    }
}