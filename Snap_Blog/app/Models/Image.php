<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory , SoftDeletes , HasUuids;

    protected $guarded = [ 'id' ] ;

    protected $path = "/storage/uploads/";

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
    ];

    #----------------------------Accessor_&_Mutator------------------------------------

    public function url():Attribute{
        return Attribute::make(
            get:fn($url) => str_contains($url , "http") ? $url : asset($this->path . $url) ,
            set:fn($url) => str_contains($url , "http") ? $url : basename($url)
        );
    }

    
}
