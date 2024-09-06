<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['name','code','major_id'];

    public function exams()
    {
       return $this->hasMany(Exam::class,'course_id','id');
    }

    public function major()
    {
       return $this->belongsTo(Major::class,'major_id','id');
    }


}
