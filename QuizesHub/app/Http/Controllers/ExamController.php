<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use App\Models\Exam;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Level;


class ExamController extends Controller
{
    public function index() {  
        return Exam::all();
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
        return Exam::findorfail($id);
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
