<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'role_id', 'user_id')->withPivot('created_at', 'updated_at', 'deleted_at');
    }
}
