<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Admin\faculty;
use App\Models\Admin\major;
use App\Models\Admin\CourseFacultyMajor;
use App\Models\Admin\Exam;
use App\Models\Admin\Feedback;

class CourseController extends Controller
{
    public function index()
    {
        $CourseData = Course::get();

        return view('dashboard.course.index', compact('CourseData'));
    }
    public function create()
    {
        $CourseData = Course::get();
        $AllMajors = major::select('id', 'name')->distinct()->get();
        $AllFaculties = faculty::select('id', 'name')->distinct()->get();

        return view('dashboard.course.create', compact('CourseData', 'AllMajors', 'AllFaculties'));
    }
    public function store(CourseRequest $request)
    {

        $validatedData = $request->validated();

        course::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->back()->with('messege', 'Course added successfully..');
    }
    public function show(string $id)
    {
        $CourseData = course::findorfail($id);
        $majors = major::get();
        $fs = faculty::get();

        $faculties = [];
        foreach ($CourseData->majors as $major) {
            $faculty = faculty::where('id', $major->pivot->faculty_id)->first();
            $faculties[$CourseData->id . '-' . $major->id . '-' . $major->pivot->faculty_id] = $faculty->name;
        }


        return view('dashboard.course.show', compact('CourseData', 'majors', 'fs', 'faculties'));
    }
    public function edit(string $id)
    {
        $CourseData = course::findorfail($id);



        return view('dashboard.course.edit', compact('CourseData'));
    }
    public function update(CourseRequest $request, string $id)
    {

        $request->validated();

        course::findorfail($id)->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->back()->with('messege', 'Course updated successfully..');
    }
    public function destroy(string $id)
    {
        Course::findorfail($id)->delete();
        CourseFacultyMajor::where('course_id', $id)->delete();
        Exam::where('course_id', $id)->delete();
        return redirect()->back()->with('messege', ' Course deleted successfully..');
    }
    public function archive()
    {
        $CourseData = course::onlyTrashed()->get();
        return view('dashboard.course.archive', compact('CourseData'));
    }
    public function forceDelete(string $id)
    {
        CourseFacultyMajor::where('course_id', $id)->forceDelete();
        Exam::where('course_id', $id)->forceDelete();
        course::onlyTrashed()->findorfail($id)->forceDelete();
        return redirect()->back()->with('messege', 'Course deleted successfully..');
    }
    public function restore(string $id)
    {

        course::onlyTrashed()->findorfail($id)->restore();
        CourseFacultyMajor::where('course_id', $id)->restore();
        Exam::where('course_id', $id)->restore();
        return redirect()->back()->with('messege', 'Course restored successfully..');
    }

    public function addToMajor(string $id)
    {
        return view('dashboard.Course.addtomajor', compact('id'));
    }


    public function addMajorsAndFaculties(Request $request, string $id)
    {



        $request->validate([
            'faculty' => ['required', 'integer'],
            'major' => ['required', 'integer'],
            'degree' => 'required',
        ]);


        $course = Course::findOrFail($id);

        $faculty_id = $request->input('faculty');
        $major_id = $request->input('major');
        $degree = $request->input('degree');
        // Check if the same major in the same faculty already exists for the course
        $existing = $course->faculties()
            ->wherePivot('faculty_id', $faculty_id)
            ->wherePivot('major_id', $major_id)
            ->exists();

        if ($existing) {
            // If the combination already exists, update it
            $course->faculties()->updateExistingPivot($faculty_id, [
                'major_id' => $major_id,
                'degree' => $degree
            ]);
        } else {

            // If no such combination exists, insert a new record without detaching others
            $course->faculties()->attach([
                $faculty_id => ['major_id' => $major_id, 'degree' => $degree]
            ]);
        }

        return redirect()->back()->with('message', 'Added successfully.');
    }
}
