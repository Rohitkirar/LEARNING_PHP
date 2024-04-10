<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function users(){

        return $this->belongsTo(User::class , 'user_id');
    
    }

    public function postImages(){

        return $this->hasMany(PostImage::class);
    
    }

    public function postLikes(){

        return $this->hasMany(PostLike::class);
    
    }

    public function postComments(){

        return $this->hasMany(PostComment::class);
    
    }

    public function category(){

        return $this->belongsTo(Category::class);
    
    }
}
