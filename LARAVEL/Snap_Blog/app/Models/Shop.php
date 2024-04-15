<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    #using pivot table product_shop

    public function products(){

        return $this->belongsToMany(Product::class)->withPivot('created_at' , 'updated_at');
    
    }
}
