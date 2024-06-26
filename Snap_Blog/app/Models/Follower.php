<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use HasFactory , SoftDeletes , HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
    ];

    #----------------------------Relationships------------------------------------

    public function user(){
        return $this->belongsTo(User::class , "follower_id" , "id" );
    }

}
