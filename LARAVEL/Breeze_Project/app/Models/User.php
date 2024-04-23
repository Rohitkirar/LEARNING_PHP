<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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


    // accessor and mutators

    public function firstName() : Attribute{
        
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value)
        );

    }

    public function lastName() : Attribute {
        
        return Attribute::make(
            get: fn($value) => ucfirst($value) ,
            set: fn($value) => strtolower($value)
        );

    }

    public function email() : Attribute{
        
        return Attribute::make(
            set: fn($value) => strtolower($value)
        );

    }


}