<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'university_id'];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function majors()
    {
        return $this->hasMany(Major::class, 'faculty_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'faculty_id', 'id');
    }
}
