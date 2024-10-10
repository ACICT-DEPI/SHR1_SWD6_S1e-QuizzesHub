<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\ExamUserRequest;
use App\Models\Admin\ExamUser;
use App\Models\Admin\Exam;
// use App\Models\User;

class ExamUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExamUser::get()->toArray();
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
    public function store(ExamUserRequest $request)
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
        return ExamUser::findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exams = Exam::get();

        $ExamUser = ExamUser::findorfail($id);
        return 'edit view';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamUserRequest $request, string $id)
    {
        $ExamUser = ExamUser::findorfail($id);
        $ExamUser->update([
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
        $ExamUser = ExamUser::findorfail($id);
        $ExamUser->delete();
        return redirect()->back()->with('msg', 'Archived successfully');
    }

    public function archive() {
        $ExamUsers = ExamUser::onlyTrashed()->get()->toArray();
        return $ExamUsers;
    }

    public function restore(string $id) {
        $ExamUser = ExamUser::onlyTrashed()->findorfail($id);
        $ExamUser->restore();
        return redirect()->back()->with('msg', 'restored successfully');
    }

    public function forceDelete(string $id) {
        $ExamUser = ExamUser::withTrashed()->where('id', $id);
        $ExamUser->forceDelete();
        return redirect()->back()->with('msg', 'deleted successfully');
    }
}
