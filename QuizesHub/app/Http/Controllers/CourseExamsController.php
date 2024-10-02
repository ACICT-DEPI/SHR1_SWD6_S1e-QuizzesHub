<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Models\Admin\CourseFacultyMajorUniversity;
use Illuminate\Support\Facades\Auth;



class CourseExamsController extends Controller
{
    public function CourseExams($course)
    {
        $course_id = CourseFacultyMajorUniversity::where('course_id',$course)
        ->where('university_id',Auth::user()->university_id)
        ->where('faculty_id',Auth::user()->faculty_id)
        ->where('major_id',Auth::user()->major_id)
        ->first();
        $course=Course::where('id',$course)->first();
        $exams = $course_id->exams;

         return view('site.pages.CourseExams',compact('exams','course'));
    }
}
