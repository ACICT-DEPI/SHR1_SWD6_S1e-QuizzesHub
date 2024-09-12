<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['user_id','exam_id','attempt_number','start_time','end_time','score'];
    public function exam()
    {
       return $this->belongsTo(Exam::class,'exam_id','id');
    }
    public function user()
    {
       return $this->belongsto(User::class,'user_id','id');
    }


}

