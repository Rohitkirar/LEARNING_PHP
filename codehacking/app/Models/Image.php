<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $path = "storage/images/";

    #accessor

    public function getImageAttribute($image){
        if(isset($image))
            return asset($this->path.$image);
        return asset($this->path."demo.jpg");
    }
}
