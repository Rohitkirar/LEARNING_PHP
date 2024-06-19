<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = ['id'];

    #------------------------------Relationships----------------------------------
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function images(){
        return $this->morphMany(Image::class , 'imageable');
    }
}
