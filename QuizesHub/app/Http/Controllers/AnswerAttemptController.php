<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerAttempt;
use App\Http\Requests\AnswerAttemptRequest;

class AnswerAttemptController extends Controller
{
    public function index()
    {   
       $AnswerAttemptData=AnswerAttempt::all();
       return $AnswerAttemptData;
       //return view('admin.index',compact('AnswerAttemptData'));
    }
    public function create()
    {  
        //return view('admin.create');
        return "create";
    }
    public function store(AnswerAttemptRequest $request)
    {
        $validatedData=$request->validate();
        AnswerAttempt::create([
            'id'=>$request->id,
            'user_id'=>$request->user_id,
            'question_id'=>$request->question_id,
            'selected_answer_id'=>$request->selected_answer_id,
            'attempt_number'=>$request->attempt_number,
      
        ]);
        // return redirect()->back()->with('messege','Answer attempt added successfully..');
        return "store";
    }
    public function show(string $id)    
    {
        $AnswerAttemptData=AnswerAttempt::findorfail($id);
        // return view('admin.show',compact('AnswerAttemptData'));
        return "show";
    }
    public function edit(string $id)
    {
       $AnswerAttemptData=AnswerAttempt::findorfail($id);
    //    return view('admin.update',compact('AnswerAttemptData'));
        return "edit";
    }
    public function update(AnswerAttemptRequest $request, string $id)
    {
        $request->validate();
        AnswerAttempt::findorfail($id)->update([
            'user_id'=>$request->user_id,
            'question_id'=>$request->question_id,
            'selected_answer_id'=>$request->selected_answer_id,
            'attempt_number'=>$request->attempt_number,
        ]);
        // return redirect()->back()->with('messege','Answer attempt updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        AnswerAttempt::findorfail($id)->delete();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "destroy";
    }
    public function archive(){
        $AnswerAttemptData=AnswerAttempt::onlyTrashed()->get();
        // return view('admin.archive',compact('AnswerAttemptData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        AnswerAttempt::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        AnswerAttempt::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "restore";
    }
}
