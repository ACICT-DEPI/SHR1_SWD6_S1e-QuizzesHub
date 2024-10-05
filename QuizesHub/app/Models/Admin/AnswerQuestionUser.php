<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestionUser extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['user_id','question_id','selected_answer_id','exam_user_id'];

    public function question()
    {
       return $this->belongsTo(Question::class,'question_id','id');
    }
    public function answer()
    {
       return $this->belongsto(Answer::class,'selected_answer_id','id');
    }
    public function user()
    {
       return $this->belongsto(User::class,'user_id','id');
    }

    public function exam_user()
    {
       return $this->belongsto(ExamUser::class,'exam_user_id','id');
    }


}
