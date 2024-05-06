<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $path = "/storage/images/";

    #accessor

    public function getImageAttribute($image){
        if(isset($image))
            return $this->path.$image;
        return $this->path."demo.jpg";
    }
}
