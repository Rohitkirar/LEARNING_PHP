<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = ['id'];

    protected $path = "storage/images/";

    # relationship

    public function user(){
        return $this->belongsTo(User::class);
    }

    # accessor 

    public function getImageAttribute($image){
        if(strpos($image , 'https://') !== FALSE || strpos($image , 'http://') !== FALSE)
            return $image ;
        else    
            return $this->path.$image;
    }
}
