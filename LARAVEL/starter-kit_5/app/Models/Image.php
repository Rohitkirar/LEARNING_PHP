<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = ['id'];

    public $img_path = "storage/uploads/images/";

    public $demoImage = "storage/uploads/images/demoImage.jpg" ;

    #-----------------------------Accessors&Mutators-----------------------------------

    public function path():Attribute{
        return new Attribute(
            get:fn($image) => $image ? asset($this->img_path . $image) : asset($this->demoImage),
            set:fn($image) => basename($image)
        );
    }


    #------------------------------Relationships----------------------------------
    public function page(){
        return $this->belongsTo(Page::class);
    }
}
