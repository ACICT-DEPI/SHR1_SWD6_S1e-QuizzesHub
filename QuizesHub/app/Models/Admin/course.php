<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    // public $incrementing=false;
    use SoftDeletes;
    protected $fillable =['name','major_id','faculty_id'];

    public function exams()
    {
       return $this->hasMany(Exam::class,'course_id','id');
    }


    public function major()
    {
       return $this->belongsTo(Major::class,'major_id','id');
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id','id');

    }

}
