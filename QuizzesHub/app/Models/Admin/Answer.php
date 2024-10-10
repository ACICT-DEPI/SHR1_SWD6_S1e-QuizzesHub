<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'type',
        'text',
        'is_correct',
    ];

    public function question() {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function AnswerQuestionUser() {
        return $this->hasMany(AnswerQuestionUser::class, 'selected_answer_id', 'id');
    }

    public function user() {
        return $this->belongsToMany(User::class, 'answer_question_user', 'selected_answer_id', 'user_id')->withPivot('question_id', 'exam_user_id', 'created_at', 'updated_at');
    }

    public function exam_user() {
        return $this->belongsToMany(User::class, 'answer_question_user', 'selected_answer_id', 'exam_user_id')->withPivot('question_id', 'user_id', 'created_at', 'updated_at');
    }

}
