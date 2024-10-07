<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin\CourseFacultyMajorUniversity;
use Illuminate\Support\Facades\Auth;

class IsAuthorized2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $course_id = $request->route('course');
        $course = CourseFacultyMajorUniversity::where('course_id',$course_id)
        ->where('university_id',Auth::user()->university_id)
        ->where('faculty_id',Auth::user()->faculty_id)
        ->where('major_id',Auth::user()->major_id)
        ->first();
        if ($course) {
            return $next($request);
        }else{
            return redirect()->back()->with('msg', 'You are not allowed to access this page');
        }
    }
}
