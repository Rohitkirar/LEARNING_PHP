<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;
    public $path = "storage/uploads/categories/";
    protected $guarded = ['id'];

    #------------------------------Relationships----------------------------------
    public function posts(){
        return $this->hasMany(Post::class);
    }

    #------------------------------Accessors&Mutators----------------------------------
    public function image():Attribute{
        return new Attribute(
            get: fn($image) => asset($this->path . $image),
            set: fn($image) => basename($image)
        );
    }

    public function name():Attribute{
        return new Attribute(
            get: fn($name) => $name ? ucfirst($name) : null,
            set: fn($name) => strtolower($name)
        );
    }
}
