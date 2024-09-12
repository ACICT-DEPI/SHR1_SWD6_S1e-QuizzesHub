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


class ExamController extends Controller
{
    public function index() {
        // $exams =  Exam::get()->toArray();
        // $courses = [];
        $exams = Exam::with('course')->get();

        return view('dashboard.exams.index', ['exams'=>$exams]);
        // return view('welcome');
    }

    public function create() {
        $universities = University::get()->toArray();
        $faculties = Faculty::get()->toArray();
        $majors = Major::get()->toArray();
        $levels = Level::get()->toArray();
        return $universities;
    }

    public function archive() {
        $exams = Exam::onlyTrashed()->get()->toArray();
        return $exams;
    }

    public function store(ExamRequest $request) {
        return 'stored';
    }

    public function show($id) {
        // $exam = Exam::findorfail($id);
        // $exam = Exam::findorfail($id);
        // dd($exam->questions->answers);
        // // $exam = Exam::with('questions')->get()->toArray();
        $exam = Exam::with('course','questions.answers')->findOrFail($id);

        return view('dashboard.exams.show', ['exam'=>$exam]);
    }

    public function edit($id) {
        $universities = University::get()->toArray();
        $faculties = Faculty::get()->toArray();
        $exam = Exam::findorfail($id)->toArray();
        return 'edit view';
    }

    public function update(ExamRequest $request, $id) {
        $exam = Exam::findOrFail($id);
        $exam->update([
            'type'=>$request->type,
            'course_id'=>$request->course_id,
            'date'=>$request->date,
            'duration'=>$request->duration,
        ]);
        return redirect()->back()->with('msg', 'Updated Successfully..');
    }

    public function destroy($id) {
        $exam = Exam::findorfail($id);
        $exam->delete();
        return redirect()->back()->with('msg', 'deleted succesfully');
    }

    public function restore($id) {
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
