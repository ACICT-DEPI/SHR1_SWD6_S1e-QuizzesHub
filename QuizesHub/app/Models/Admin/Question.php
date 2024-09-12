<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'text',
        'exam_id',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function answerAttempts() {
        return $this->hasMany(AnswerAttempt::class, 'question_id', 'id');
    }

    public function answers() {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'question_id', 'id');
    }


}
