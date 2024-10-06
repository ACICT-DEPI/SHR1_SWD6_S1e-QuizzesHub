<?php

namespace App\Http\Middleware;

use App\Models\Admin\CourseFacultyMajorUniversity;
use App\Models\Admin\ExamUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Exam;

class IsAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $exam_id = $request->route('id');
        $exam=Exam::findorfail($exam_id);
        $course_id = $exam->course_id;
        $course = CourseFacultyMajorUniversity::findorfail($course_id);
        if (Auth::user()->university_id == $course->university_id && Auth::user()->faculty_id == $course->faculty_id && Auth::user()->major_id == $course->major_id) {
            return $next($request);
        }
        return redirect()->back()->with('msg', 'You are not allowed to access this page');
    }
}
