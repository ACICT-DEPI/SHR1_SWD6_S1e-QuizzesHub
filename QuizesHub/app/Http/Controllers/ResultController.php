<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResultRequest;
use App\Models\Result;
use App\Models\Exam;
// use App\Models\User;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Result::get()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view with somethings what u want
        return 'create view';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultRequest $request)
    {
        return 'stored';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $exam = Exam::findorfail();
        // $user = User::findorfail();
        return Result::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exams = Exam::get();

        $Result = Result::findorfail($id);
        return 'edit view';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultRequest $request, string $id)
    {
        $Result = Result::findorfail($id);
        $Result->update([
            'user_id'=>$request->user_id,
            'exam_id'=>$request->exam_id,
            'score'=>$request->score,
            'total_score'=>$request->total_score,
            'completion_time'=>$request->completion_time,
        ]);
        return redirect()->back()->with('msg', 'updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Result = Result::findorfail($id);
        $Result->delete();
        return redirect()->back()->with('msg', 'Archived successfully');
    }

    public function archive() {
        $Results = Result::onlyTrashed()->get()->toArray();
        return $Results;
    }

    public function restore(string $id) {
        $Result = Result::onlyTrashed()->findorfail($id);
        $Result->restore();
        return redirect()->back()->with('msg', 'restored successfully');
    }
    
    public function forceDelete(string $id) {
        $Result = Result::withTrashed()->where('id', $id);
        $Result->forceDelete();
        return redirect()->back()->with('msg', 'deleted successfully');
    }
}
