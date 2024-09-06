<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['user_id','exam_id','rating','comments'];

    public function exam()
    {
       return $this->belongsTo(Exam::class,'exam_id','id');
    }

    public function user()
    {
       return $this->belongsto(User::class,'user_id','id');
    }




}
