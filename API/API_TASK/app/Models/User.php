<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Laravel\Passport\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    protected $guarded = ['id'];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #---------------------------Relationships-------------------------------------

    public function giftCards(){
        return $this->hasMany(GiftCard::class);
    }

    public function cashbacks(){
        return $this->hasManyThrough(Cashback::class , GiftCard::class);
    }


    #----------------------------Accessor&Mutators------------------------------------

    public function password():Attribute{
        return Attribute::make(
            set:fn($password) => bcrypt($password)
        );
    }

}
