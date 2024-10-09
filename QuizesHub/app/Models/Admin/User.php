<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;

class User extends Authenticatable implements MustVerifyEmail
{

    use HasFactory, Notifiable;
    use SoftDeletes;
    use HasUserAvatar;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'fname',
        'lname',
        'username',
        'email',
        'password',
        'phone',
        'image_path',
        'gender',
        'role',
        'score',
        'university_id',
        'faculty_id',
        'major_id',
        'level_id',
        'provider_id',
        'provider',
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

    public function courses()
    {
        return CourseFacultyMajorUniversity::where('university_id', $this->university_id)
            ->where('faculty_id', $this->faculty_id)
            ->where('major_id', $this->major_id)
            ->get();
        // return $this->belongsToMany(Course::class, 'course_faculty_major_universities', 'user_id', 'course_id')->withPivot('university_id', 'faculty_id', 'major_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }


    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_user', 'user_id', 'exam_id')->withPivot('score', 'completion_time', 'created_at', 'updated_at', 'deleted_at');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function ExamUser()
    {
        return $this->hasMany(ExamUser::class, 'user_id', 'id');
    }

    public function AnswerQuestionUser()
    {
        return $this->hasMany(AnswerQuestionUser::class, 'user_id', 'id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answer_question_user', 'user_id', 'question_id')->withPivot('selected_answer_id', 'exam_user_id', 'created_at', 'updated_at', 'deleted_at');
    }

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_question_user', 'user_id', 'selected_answer_id')->withPivot('question_id', 'exam_user_id', 'created_at', 'updated_at', 'deleted_at');
    }

    public function newExams()
    {
        return $this->hasMany(NewExam::class);
    }
}
