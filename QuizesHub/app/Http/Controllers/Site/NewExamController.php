<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\NewExam;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Major;
use App\Models\Admin\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Requests\NewExamRequest;

class NewExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $new_exams = NewExam::get();
    //     return view('dashboard.newexams.index', compact('new_exams'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = University::get();
        $faculties = Faculty::get();
        $majors = Major::get();
        $courses = course::get();

        return view('dashboard.newexams.send-exam', compact('universities', 'faculties', 'majors', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewExamRequest $request)
    {
        // dd(time());
        $file = $request->file('file');
        $fileExt = $file->getClientOriginalExtension();
        $fileName = "file" . time() . '.' . $fileExt;
        // dd($fileName);
        $file_path = $file->storeAs('files/newexams', $fileName);
        NewExam::create([
            'user_id' => Auth::id(),
            'file_path' => $file_path,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'course_id' => $request->course_id,
            'type' => $request->type,
        ]);

        Auth::user()->score = Auth::user()->score + 100;
        Auth::user()->save();

        return redirect()->back()->with('message', "the exam saved successfuly and you get 100 exstra points");
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $exam = NewExam::findorfail($id);
    //     return view('dashboard.newexams.show', compact('exam'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewExam $newExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewExam $newExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(NewExam $newExam)
    // {
    //     //
    // }
}
