<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feedback extends Model
{
   use HasFactory;
   use SoftDeletes;
    // public $incrementing=false;
    protected $table = 'feedbacks';
    protected $fillable =['user_id','exam_id','rating','comments'];

    public function exam()
    {
      return $this->belongsto(Exam::class,'exam_id','id');
    }

    public function user()
    {
       return $this->belongsto(User::class, 'user_id', 'id');
    }




}
