<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    // public function user(){
    //     return $this->hasOneThrough(User::class , Post::class  , 'user_id' , 'id' , 'post_id');
    // }
}
