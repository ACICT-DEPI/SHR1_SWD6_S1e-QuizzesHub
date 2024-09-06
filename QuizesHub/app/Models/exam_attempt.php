<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_attempt extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['user_id','exam_id','attempt_number','start_time','end_time','score'];
    public function exam()
    {
       return $this->belongsTo(exam::class,'exam_id','id');
    }
public function user()
    {
       return $this->belongsto(user::class,'user_id','id');
    }

    
}

