<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['name','faculty_id'];

    public function fuculty()
    {
       return $this->belongsTo(Faculty::class,'faculty_id','id');
    }

    public function user()
    {
       return $this->hasMany(User::class);
    }
    public function course(){
        return $this->hasMany(Course::class);

    }

}

