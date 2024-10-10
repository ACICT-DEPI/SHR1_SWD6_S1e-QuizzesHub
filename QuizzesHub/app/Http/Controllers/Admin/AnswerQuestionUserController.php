<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AnswerQuestionUser;
use App\Http\Requests\Admin\AnswerQuestionUserRequest;

class AnswerQuestionUserController extends Controller
{
    public function index()
    {
       $AnswerQuestionUserData=AnswerQuestionUser::all();
       return $AnswerQuestionUserData;
       //return view('admin.index',compact('AnswerQuestionUserData'));
    }
    public function create()
    {
        //return view('admin.create');
        return "create";
    }
    public function store(AnswerQuestionUserRequest $request)
    {
        $validatedData=$request->validate();
        AnswerQuestionUser::create([
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
        $AnswerQuestionUserData=AnswerQuestionUser::findorfail($id);
        // return view('admin.show',compact('AnswerQuestionUserData'));
        return "show";
    }
    public function edit(string $id)
    {
       $AnswerQuestionUserData=AnswerQuestionUser::findorfail($id);
    //    return view('admin.update',compact('AnswerQuestionUserData'));
        return "edit";
    }
    public function update(AnswerQuestionUserRequest $request, string $id)
    {
        $request->validate();
        AnswerQuestionUser::findorfail($id)->update([
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
        AnswerQuestionUser::findorfail($id)->delete();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "destroy";
    }
    public function archive(){
        $AnswerQuestionUserData=AnswerQuestionUser::onlyTrashed()->get();
        // return view('admin.archive',compact('AnswerQuestionUserData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        AnswerQuestionUser::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        AnswerQuestionUser::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','Answer attempt deleted successfully..');
        return "restore";
    }
}
