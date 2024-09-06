<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function faculties()
    {
        return $this->hasMany(Faculty::class, 'university_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'university_id', 'id');
    }
}
