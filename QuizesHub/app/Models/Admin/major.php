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
    protected $fillable =['name'];


    public function users()
    {
       return $this->hasMany(User::class,'major_id','id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_faculty_major', 'major_id', 'course_id');
    }

    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'course_faculty_major', 'major_id', 'faculty_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($major) {
            if ($major->isForceDeleting()) {
                $major->courses()->forceDelete();
            } else {
                $major->courses()->delete();
            }
        });

        static::restored(function ($major) {
            $major->courses()->withTrashed()->restore();
        });
    }

}

