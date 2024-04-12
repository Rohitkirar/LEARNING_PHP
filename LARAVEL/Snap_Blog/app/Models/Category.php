<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    public function posts(){
        
        return $this->hasMany(Post::class);
    
    }

    public function comments(){
        
        return $this->hasManyThrough(PostComment::class , Post::class);
    
    }

    public function likes(){
        
        return $this->hasManyThrough(PostLike::class , Post::class);

    }

    public function image(){
        
        return $this->morphOne(Image::class , 'imageable');

    }
}
