<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        if(count($courses) > 0){
            $courses = CourseResource::collection($courses);
            return ApiHelper::getResponse(200, 'Courses found', $courses);
        }else{
            return ApiHelper::getResponse(200, 'Courses not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $course = Course::create($data);
        if($course){
            $course = new CourseResource($course);
            return ApiHelper::getResponse(201, 'Course created', $course);
        }else{
            return ApiHelper::getResponse(200, 'Course not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        if($course){
            $course= new CourseResource($course);
            return ApiHelper::getResponse(200, 'Course found', $course);
        }else{
            return ApiHelper::getResponse(200, 'Course not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $course = Course::find($id);
        if($course){
            $course->update($data);
            $course = new CourseResource($course);
            return ApiHelper::getResponse(200, 'Course updated', $course);
        }else{
            return ApiHelper::getResponse(200, 'Course not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if($course){
            $course->delete();
            return ApiHelper::getResponse(200, 'Course deleted');
        }else{
            return ApiHelper::getResponse(200, 'Course not found');
        }
    }
}
