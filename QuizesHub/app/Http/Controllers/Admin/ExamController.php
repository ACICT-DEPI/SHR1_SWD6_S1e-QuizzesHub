<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ExamRequest;
use App\Models\Admin\Exam;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;
use App\Models\Admin\Level;
use App\Models\Admin\Course;
use App\Models\Admin\User;
use App\Models\Admin\CourseFacultyMajorUniversity;
use Symfony\Component\VarDumper\VarDumper;

class ExamController extends Controller
{
    public function index() 
    {
        $exams = Exam::get();
        return view('dashboard.exams.index', compact('exams'));
    }

    public function create() 
    {
        $universities = University::get()->toArray();
        $faculties = Faculty::get()->toArray();
        $courses = Course::get()->toArray();
        return view('dashboard.exams.create', compact('courses', 'faculties', 'universities'));
    }

    public function archive() 
    {
        $exams = Exam::onlyTrashed()->get();
        return view('dashboard.exams.archive', compact('exams'));
    }

    public function store(ExamRequest $request) 
    {
        Exam::create([
            'type'=>$request->type,
            'course_name'=>$request->course_name,
            'course_id'=>$request->course_id,
            'faculty_id'=>$request->faculty_id,
            'university_id'=>$request->university_id,
            'date'=>$request->date,
            'duration'=>$request->duration,
        ]);
        return redirect()->back()->with('msg', 'Exam Added Successfully');
    }

    public function show($id) 
    {
        $exam = Exam::findorfail($id);
        return view('dashboard.exams.show', compact('exam'));
    }

    public function edit($id) 
    {
        $universities = University::get();
        $faculties = Faculty::get();
        $courses = Course::get();
        $exam = Exam::findorfail($id);
        return view('dashboard.exams.edit', compact('exam', 'courses', 'faculties', 'universities'));
    }

    public function update(ExamRequest $request, $id) 
    {
        $exam = Exam::findOrFail($id);
        $exam->update([
            'type'=>$request->type,
            'course_name'=>$request->course_name,
            'course_id'=>$request->course_id,
            'faculty_id'=>$request->faculty_id,
            'university_id'=>$request->university_id,
            'date'=>$request->date,
            'duration'=>$request->duration,
        ]);
        return redirect()->back()->with('msg', 'Updated Successfully..');
    }

    public function destroy($id) 
    {
        $exam = Exam::findorfail($id);
        $exam->delete();
        return redirect()->back()->with('msg', 'deleted succesfully');
    }

    public function restore($id) 
    {
        $exam = Exam::onlyTrashed()->findOrFail($id);
        $exam->restore();
        return redirect()->back()->with('msg', 'restored successfully');
    }

    public function forceDelete($id) {
        $exam = Exam::withTrashed()->where('id', $id);
        $exam->forceDelete();
        return redirect()->back()->with('msg', 'deleted permanently');
    }
}