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

    public function answerAttempts() {
        return $this->hasMany(AnswerAttempt::class, 'selected_answer_id', 'id');
    }

}
