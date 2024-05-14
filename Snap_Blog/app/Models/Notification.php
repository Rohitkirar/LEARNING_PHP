<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime"
    ];

    #--------------------------Relationships--------------------------------------

    public function notifiable()
    {
        return $this->morphTo("notifiable");
    }

    #------------------------Accessors_&_Mutators--------------------------------

    public function message(): Attribute
    {
        return Attribute::make(
            get: fn ($message) => stripslashes($message),
            set: fn ($message) => addslashes($message)
        );
    }
}
