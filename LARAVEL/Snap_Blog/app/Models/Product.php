<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory ;

    protected $guarded = ['id'];

    #using pivot table product_shop

    public function shops(){

        return $this->belongsToMany(Shop::class)->withPivot('created_at');
    
    }
}
