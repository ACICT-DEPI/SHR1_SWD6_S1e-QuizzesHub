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
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function examAttempts() {
        return $this->hasMany(ExamAttempt::class, 'exam_id', 'id');
    }

    public function questions() {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    }

    public function results() {
        return $this->hasMany(Result::class, 'exam_id', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'exam_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(Exam::class, 'exam_attempts', 'exam_id', 'user_id')->withPivot('score', 'attempt_number', 'start_time', 'end_time', 'created_at', 'updated_at', 'deleted_at');
    }
}
