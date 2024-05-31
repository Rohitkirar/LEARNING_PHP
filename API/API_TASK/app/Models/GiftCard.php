<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = ['id'];


    #-----------------------------Relationships-----------------------------------

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function giftCardProduct(){
        return $this->belongsTo(GiftCardProduct::class);
    }

    public function cashback(){
        return $this->hasOne(Cashback::class);
    }

}
