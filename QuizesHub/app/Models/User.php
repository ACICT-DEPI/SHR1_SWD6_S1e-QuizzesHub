<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'email',
        'password',
        'phone',
        'image_path',
        'gender',
        'university_id',
        'faculty_id',
        'major_id',
        'level_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withPivot('created_at', 'updated_at');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_attempts', 'user_id', 'exam_id')->withPivot('score', 'attempt_number', 'start_time', 'end_time', 'created_at', 'updated_at');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }

    public function answerAttempts()
    {
        return $this->hasMany(AnswerAttempt::class, 'user_id', 'id');
    }
}
