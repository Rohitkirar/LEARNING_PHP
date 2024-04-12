<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory , SoftDeletes , HasUuids;

    protected $guarded = ['id'];

    #using pivot table course_student

    public function students(){
        
        return $this->belongsToMany(Student::class , 'course_student' , 'course_id' , 'student_id')
                ->withPivot('created_at' , 'updated_at');
    
    }
    

}
