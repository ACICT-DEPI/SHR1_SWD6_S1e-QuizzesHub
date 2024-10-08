<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Commentable;

    protected $fillable = [
        'type',
        'text',
        'exam_id',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function AnswerQuestionUser() {
        return $this->hasMany(AnswerQuestionUser::class, 'question_id', 'id');
    }

    public function answers() {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }


    public function user() {
        return $this->belongsToMany(User::class, 'answer_question_user', 'question_id', 'user_id')->withPivot('selected_answer_id', 'exam_user_id', 'created_at', 'updated_at');
    }

    public function ExamUser() {
        return $this->belongsToMany(User::class, 'answer_question_user', 'question_id', 'exam_user_id')->withPivot('selected_answer_id', 'user_id', 'created_at', 'updated_at');
    }
}
