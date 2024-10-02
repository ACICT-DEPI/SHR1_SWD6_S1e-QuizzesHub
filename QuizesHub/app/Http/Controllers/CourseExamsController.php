<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Course;

class CourseExamsController extends Controller
{
    public function CourseExams($course)
    {
        $course = Course::find($course);
        $exams = $course->exams;
      
         return view('site.pages.CourseExams',compact('exams','course'));
    }
}
