<?php

namespace App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    public function getMostUniversities()
    {
        $universities = DB::table('users')
            ->select('universities.name', DB::raw('COUNT(users.id) as user_count'))
            ->join('universities', 'users.university_id', '=', 'universities.id')
            ->groupBy('universities.name')
            ->orderByDesc('user_count')
            ->limit(6)
            ->get();

        foreach ($universities as $university) {
            $university->name = explode(' ', $university->name)[0];
        }

        return response()->json($universities);
    }

    public function getTopUsersByScore()
    {

        $users = DB::table('users')
            ->select('fname', 'lname', 'score')
            ->orderByDesc('score')
            ->limit(7)
            ->get();

        return response()->json($users);
    }

    public function getMostPopularCourses()
    {
        // Query to get the most popular courses based on the number of users taking their exams
        $courses = DB::table('exam_user')
            ->join('exams', 'exam_user.exam_id', '=', 'exams.id')
            ->join('course_faculty_major_university', 'exams.course_id', '=', 'course_faculty_major_university.id')
            ->join('courses', 'course_faculty_major_university.course_id', '=', 'courses.id')
            ->select('courses.name', 'courses.code', DB::raw('COUNT(exam_user.user_id) as user_count'))
            ->groupBy('courses.name', 'courses.code')
            ->orderByDesc('user_count')
            ->limit(5)
            ->get();

        // Return the data as JSON for the chart
        return response()->json($courses);
    }
}
