<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = ['id'];

    #------------------------------Relationships----------------------------------
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function pages(){
        return $this->hasMany(Page::class);
    }
}
