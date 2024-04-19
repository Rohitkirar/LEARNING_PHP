<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [ 'id' ] ;

    public $path = "Upload/"; 

    // get the parent imageable model (user or post);
    
    public function imageable(){

        return $this->morphTo();
    
    }

    
    // accessor

    public function getUrlAttribute($url){
        return $this->path . $url;
    }
}
