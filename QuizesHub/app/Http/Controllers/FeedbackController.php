<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use App\Http\Requests\FeedbackRequest;


class FeedbackController extends Controller
{
    public function index()
    {   
        $UserData = Feedback::with('user')->get();
         return view('dashboard.feedback.index',compact('UserData'));
    }
    public function create()
    {  
        $feedbackData=feedback::get();
        $Allusers=feedback::findOrFail(1);
        $Allexams=feedback::findOrFail(1);
        $allUsers=$Allusers->user->get();
        $allExams=$Allexams->exam->get();

        return view('dashboard.feedback.create',compact('feedbackData','allUsers','allExams'));
        
    }
    
    public function store(FeedbackRequest $request){
       
        $validatedData=$request->validated();
        return $request->all();
       
        feedback::create([
            'id'=>$request->id,
            'user_id'=>$request->user_id,
            'exam_id'=>$request->exam_id,
            'rating'=>$request->rating,
            'comments'=>$request->comments,
        ]);
        return redirect()->back()->with('messege','feedback added successfully..');
        
    }
    public function show(string $id)    
    {
        
        $UserData=feedback::findorfail($id);
        return view('dashboard.feedback.show',compact('UserData'));
        
    }
    public function edit(string $id)
    {
       $feedbackData=feedback::findorfail($id);
    //    return view('admin.update',compact('feedbackData'));
        return "edit";
    }
    public function update(FeedbackRequest $request, string $id)
    {
        $request->validate();
        feedback::findorfail($id)->update([
            'user_id'=>$request->user_id,
            'exam_id'=>$request->exam_id,
            'rating'=>$request->rating,
            'comments'=>$request->comment,
        ]);
        // return redirect()->back()->with('messege','feedback updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        // feedback::findorfail($id)->delete();
        // return redirect()->back()->with('messege','feedback deleted successfully..');
        return "destroy";
    }
    public function archive(){
    //    $feedbackData =feedback::onlyTrashed()->get();
        // return view('admin.archive',compact('feedbackData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        feedback::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','feedback deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        feedback::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','feedback deleted successfully..');
        return "restore";
    }
}
