<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Admin\University;
// use App\Models\Admin\Faculty;
// use App\Models\Admin\Major;
// use App\Models\Admin\Course;
// use App\Models\Admin\User;

class NewExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'university_id',
        'faculty_id',
        'major_id',
        'course_id',
        'type',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}