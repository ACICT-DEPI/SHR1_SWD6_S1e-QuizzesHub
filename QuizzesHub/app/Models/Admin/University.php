<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'faculty_university', 'university_id', 'faculty_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'university_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_faculty_major_university', 'university_id', 'course_id');
    }
}
