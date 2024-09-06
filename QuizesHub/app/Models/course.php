<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['name','code','major_id'];

    public function exam()
    {
       return $this->hasMany(Exam::class);
    }

    public function major()
    {
       return $this->belongsTo(Major::class,'major_id','id');
    }


}
