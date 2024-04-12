<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes  , HasUuids;

    protected $guarded = ['id'];

    #using pivot table course_student

    public function courses(){

        return $this->belongsToMany(Course::class)->withPivot('created_at');
    
    }

}
