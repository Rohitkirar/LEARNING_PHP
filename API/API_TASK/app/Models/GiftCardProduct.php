<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCardProduct extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = ['id'];

    #---------------------------Relationships-------------------------------------

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
