<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Exam extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'type',
        'course_id',
        'date',
        'duration',
    ];

    public function course() {
        return $this->belongsTo(CourseFacultyMajorUniversity::class, 'course_id', 'id');
    }


    public function questions() {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    }

    public function ExamUser() {
        return $this->hasMany(ExamUser::class, 'exam_id', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'exam_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_user', 'exam_id', 'user_id')->withPivot('score', 'completion_time', 'created_at', 'updated_at');
    }

}
