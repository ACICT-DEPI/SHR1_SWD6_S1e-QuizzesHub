<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamUser extends Model
{
    use HasFactory;

    protected $table = 'exam_user';

    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
        'completion_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }

    public function answer_question_user()
    {
        return $this->hasMany(AnswerQuestionUser::class, 'exam_user_id', 'id');
    }

    public function question()
    {
        return $this->belongsToMany(Question::class, 'answer_question_user', 'exam_user_id', 'question_id')->withPivot('selected_answer_id', 'user_id', 'created_at', 'updated_at');
    }

    public function answer()
    {
        return $this->belongsToMany(Answer::class, 'answer_question_user', 'exam_user_id', 'selected_answer_id')->withPivot('question_id', 'user_id', 'created_at', 'updated_at');
    }
}
