<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory , SoftDeletes;

    public function posts(){
    
        return $this->morphedByMany(Post::class , 'taggable');
    
    }
    
    public function videos(){

        return $this->morphedByMany(Video::class , 'taggable');
    
    }
}
