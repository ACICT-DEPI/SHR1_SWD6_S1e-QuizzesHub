<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Faculty::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = Faculty::findOrFail($id);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::findOrFail($id);
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
        // return view('admin.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        Faculty::withTrashed()->where('id', $id)->restore();
        // return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $faculty=Faculty::withTrashed()->where('id', $id)->first();
        $faculty->forceDelete();
        // return redirect()->back()->with('msg', 'User deleted permanently');
    }
}
