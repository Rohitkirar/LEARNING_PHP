<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = ['id'];
    public $demoImage = '{{asset("storage/uploads/images/demoImage.jpg")}}';

    #-----------------------------Accessors&Mutators-----------------------------------



    #------------------------------Relationships----------------------------------
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function images(){
        return $this->morphMany(Image::class , 'imageable');
    }
}
