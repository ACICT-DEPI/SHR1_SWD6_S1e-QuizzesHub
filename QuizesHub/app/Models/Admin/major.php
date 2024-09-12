<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use HasFactory;
    use SoftDeletes;
    // public $incrementing=false;
    protected $fillable =['name','faculty_id'];

    public function faculty()
    {
       return $this->belongsTo(Faculty::class,'faculty_id','id');
    }

    public function users()
    {
       return $this->hasMany(User::class,'major_id','id');
    }
    public function courses(){
        return $this->hasMany(Course::class,'major_id','id');

    }

}

