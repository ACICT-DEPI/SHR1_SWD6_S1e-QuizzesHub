<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseFacultyMajorUniversity extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'course_faculty_major_university';

    protected $fillable = [
        'course_id',
        'faculty_id',
        'major_id',
        'university_id',
        'degree',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'course_id', 'id');
    }
}
