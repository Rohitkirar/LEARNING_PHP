<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // public function images(){
    //     return $this->hasMany(PostImage::class);
    // }

    public function likes(){
        return $this->hasMany(PostLike::class);
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class );
    }

    public function images(){

        return $this->morphMany(Image::class , 'imageable' );
    
    }

    // public function tags(){
        
    //     return $this->morphToMany(Tag::class , 'taggable');

    // }


    // queryScope

    public static function scopeGetLatest($query){

        return $query->orderBy('created_at', 'DESC')->limit(10)->get(); // do not use get

    }



    
    
}