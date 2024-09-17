<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'university_id'];

    public function universities()
    {
        return $this->belongsToMany(University::class, 'faculty_university', 'faculty_id', 'university_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'faculty_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_faculty_major', 'faculty_id', 'course_id');
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'faculty_major', 'faculty_id', 'major_id');
    }
}
