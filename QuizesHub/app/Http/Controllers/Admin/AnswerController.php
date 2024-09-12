<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AnswerRequest;
use App\Models\Admin\Answer;
use App\Models\Admin\Exam;
use App\Models\Admin\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Answer::get()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view with somethings what u want
        $question = Question::get();
        return 'create view';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerRequest $request)
    {
        return 'stored';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Answer::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exams = Exam::get();
        $question = Question::get();
        $answer = Answer::findorfail($id);
        return 'edit view';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, string $id)
    {
        $answer = Answer::findorfail($id);
        $answer->update([
            'question_id'=>$request->question_id,
            'type'=>$request->type,
            'text'=>$request->text,
            'is_correct'=>$request->is_correct,
        ]);
        return redirect()->back()->with('msg', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $answer = Answer::findorfail($id);
        $answer->delete();
        return redirect()->back()->with('msg', 'Archived successfully');
    }

    public function archive() {
        $answers = Answer::onlyTrashed()->get()->toArray();
        return $answers;
    }

    public function restore(string $id) {
        $answer = Answer::onlyTrashed()->findorfail($id);
        $answer->restore();
        return redirect()->back()->with('msg', 'restored successfully');
    }

    public function forceDelete(string $id) {
        $answer = Answer::withTrashed()->where('id', $id);
        $answer->forceDelete();
        return redirect()->back()->with('msg', 'deleted successfully');
    }
}
