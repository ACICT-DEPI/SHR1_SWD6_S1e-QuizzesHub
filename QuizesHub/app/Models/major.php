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
       return $this->belongsTo(faculty::class,'faculty_id','id');
    }

    public function user()
    {
       return $this->hasMany(user::class);
    }
    public function course(){
        return $this->hasMany(course::class);

    }
    
}

