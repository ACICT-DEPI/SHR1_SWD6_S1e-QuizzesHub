<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    // public $incrementing=false;
    use SoftDeletes;
    protected $fillable =['name','code'];

    public function exams()
    {
       return $this->hasMany(Exam::class,'course_id','id');
    }


    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'course_faculty_major', 'course_id', 'faculty_id');
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'course_faculty_major', 'course_id', 'major_id');
    }

}
