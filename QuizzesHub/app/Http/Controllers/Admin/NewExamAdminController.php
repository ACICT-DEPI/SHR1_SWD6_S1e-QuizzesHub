<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\NewExam;
use Illuminate\Support\Facades\Storage;

class NewExamAdminController extends Controller
{
    public function index()
    {
        $new_exams = NewExam::get();
        return view('dashboard.newexams.index', compact('new_exams'));
    }

    public function show($id)
    {
        $exam = NewExam::findorfail($id);
        return view('dashboard.newexams.show', compact('exam'));
    }

    public function destroy($id)
    {
        $exam = NewExam::findorfail($id);
        Storage::delete($exam->file_path);
        $exam->delete();

        return redirect()->back()->with('message', 'the exam deleted successfully');
    }
}
