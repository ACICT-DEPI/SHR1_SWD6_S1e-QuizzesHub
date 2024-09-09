<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamAttempt;
use App\Http\Requests\ExamAttemptRequest;

class ExamAttemptController extends Controller
{
    public function index()
    {   
       $ExamAttemptData=ExamAttempt::all();
       return $ExamAttemptData;
    }
    public function create()
    {  
        //return view('admin.create');
        return "create";
    }
    public function store(ExamAttemptRequest $request)
    {
        $validatedData=$request->validate();
        ExamAttempt::create([
            'id'=>$request->id,
            'user_id'=>$request->user_id,
            'exam_id'=>$request->exam_id,
            'attempt_number'=>$request->attempt_number,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        // return redirect()->back()->with('messege','Exam attempt added successfully..');
        return "store";
    }
    public function show(string $id)    
    {
        $ExamAttemptData=ExamAttempt::findorfail($id);
        // return view('admins.show',compact('ExamAttemptData'));
        return "show";
    }
    public function edit(string $id)
    {
       $ExamAttemptData=ExamAttempt::findorfail($id);
    //    return view('admin.update',compact('ExamAttemptData'));
        return "edit";
    }
    public function update(ExamAttemptRequest $request, string $id)
    {
        $request->validate();
        ExamAttempt::findorfail($id)->update([
            'user_id'=>$request->user_id,
            'exam_id'=>$request->exam_id,
            'attempt_number'=>$request->attempt_number,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'score'=>$request->score
        ]);
        // return redirect()->back()->with('messege','Exam attempt updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        ExamAttempt::findorfail($id)->delete();
        // return redirect()->back()->with('messege','Exam attempt deleted successfully..');
        return "destroy";
    }
    public function archive(){
        $ExamAttemptData=ExamAttempt::onlyTrashed()->get();
        // return view('admin.archive',compact('ExamAttemptData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        ExamAttempt::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','Exam attempt deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        ExamAttempt::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','Exam attempt deleted successfully..');
        return "restore";
    }
}
