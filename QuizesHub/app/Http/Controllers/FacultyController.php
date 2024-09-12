<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use App\Models\University;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Faculty::get();
        return view('dashboard.faculties.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = University::get();
        return view('dashboard.faculties.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyRequest $request)
    {
        Faculty::create([
            'name' => $request->name,
            'university_id' => $request->university_id,
        ]);
        return redirect()->back()->with('msg', 'Faculty added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('dashboard.faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $universities = University::get();
        return view('dashboard.faculties.edit', compact('faculty', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyRequest $request, string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->update([
            'name' => $request->name,
            'university_id' => $request->university_id,
        ]);
        return redirect()->back()->with('msg', 'Faculty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->back()->with('msg', 'Faculty deleted successfully');
    }

    public function getFacultyByUniversityId(string $id)
    {
        $faculty = Faculty::where('university_id', $id)->get();
    }

    public function getFacultyByUniversityName(string $name)
    {
        $faculty = Faculty::whereHas('university', function ($query) use ($name) {
            $query->where('name', $name);
        })->get();

    }

    public function getFacultyByUniversityNameAndFacultyName(string $universityName, string $facultyName)
    {
        $faculty = Faculty::whereHas('university', function ($query) use ($universityName) {
            $query->where('name', $universityName);
        })->where('name', $facultyName)->get();
    }

    public function getFacultyByUniversityIdAndFacultyName(string $universityId, string $facultyName)
    {
        $faculty = Faculty::where('university_id', $universityId)->where('name', $facultyName)->get();
    }


    public function archive()
    {
        $data=Faculty::onlyTrashed()->get();
        return view('dashboard.faculties.archive', compact('data'));
    }

    public function restore(string $id)
    {
        Faculty::withTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('msg', 'Faculty restored successfully');
    }

    public function forceDelete(string $id)
    {
        $faculty=Faculty::withTrashed()->where('id', $id)->first();
        $faculty->forceDelete();
        return redirect()->back()->with('msg', 'Faculty deleted permanently');
    }
}
