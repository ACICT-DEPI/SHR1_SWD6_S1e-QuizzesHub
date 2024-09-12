<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory;
    // public $incrementing=false;
    use SoftDeletes;
    protected $fillable =['name','description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
