<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $path = "storage/uploads/";


    #----------------------------Relationships---------------------------------------

    public function giftCardProducts(){
        return $this->belongsToMany(GiftCardProduct::class);
    }

    #-----------------------------Accessor&Mutators-----------------------------------

    public function image():Attribute{
        return Attribute::make(
            set:fn($image) => basename($image),
        );
    }
    
    public function getImageAttribute($image){
        if($image){
            if(str_contains($image , "http") or str_contains($image , "https")){
                return $image;
            }
            return asset($this->path . $image);
        }
    }

}
