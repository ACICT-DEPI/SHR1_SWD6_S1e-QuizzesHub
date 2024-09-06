<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer_attempt extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['user_id','question_id','selected_answer_id','attempt_number'];

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


}
