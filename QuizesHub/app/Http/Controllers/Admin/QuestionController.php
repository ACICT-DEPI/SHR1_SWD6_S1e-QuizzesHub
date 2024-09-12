<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Admin\Question;
use App\Models\Admin\Exam;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::get()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view with somethings what u want
        $exam = Exam::get()->toArray();
        return 'create view';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        return 'stored';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Question::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exams = Exam::get();
        $question = Question::findorfail($id);
        return 'edit view';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, string $id)
    {
        $question = Question::findorfail($id);
        $question->update([
            'type'=>$request->type,
            'text'=>$request->text,
            'exam_id'=>$request->exam_id,
        ]);
        return redirect()->back()->with('msg', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findorfail($id);
        $question->delete();
        return redirect()->back()->with('msg', 'Archived successfully');
    }

    public function archive() {
        $questions = Question::onlyTrashed()->get()->toArray();
        return $questions;
    }

    public function restore(string $id) {
        $question = Question::onlyTrashed()->findorfail($id);
        $question->restore();
        return redirect()->back()->with('msg', 'restored successfully');
    }

    public function forceDelete(string $id) {
        $question = Question::withTrashed()->where('id', $id);
        $question->forceDelete();
        return redirect()->back()->with('msg', 'deleted successfully');
    }
}
