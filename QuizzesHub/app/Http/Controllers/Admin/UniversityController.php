<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UniversityRequest;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\FacultyUniversity;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= University::get();
        return view('dashboard.universities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UniversityRequest $request)
    {
        University::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('msg', 'University added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $university = University::findOrFail($id);
        $faculties = Faculty::get();
        return view('dashboard.universities.show', compact('university', 'faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $university = University::findOrFail($id);
        $faculties = Faculty::get();
        return view('dashboard.universities.edit', compact('university', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UniversityRequest $request, string $id)
    {
        $university = University::findOrFail($id);
        $university->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('msg', 'University updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $university = University::findOrFail($id);
        $university->delete();
        FacultyUniversity::where('university_id', $id)->delete();
        return redirect()->back()->with('msg', 'University deleted successfully');
    }

    public function archive()
    {
        $data=University::onlyTrashed()->get();
        return view('dashboard.universities.archive', compact('data'));
    }

    public function restore(string $id)
    {
        University::withTrashed()->where('id', $id)->restore();
        FacultyUniversity::withTrashed()->where('university_id', $id)->restore();
        return redirect()->route('admin.universities.index')->with('msg', 'University restored successfully');
    }

    public function forceDelete(string $id)
    {
        $university=University::withTrashed()->where('id', $id)->first();
        $university->faculties()->detach();
        $university->forceDelete();
        return redirect()->back()->with('msg', 'University deleted permanently');
    }

    public function addFaculties(Request $Request,string $id)
    {
        $university = University::findOrFail($id);
        $university->faculties()->syncWithoutDetaching($Request->faculties);
        return redirect()->back()->with('msg', 'Faculties added successfully');
    }

    public function removeFaculty(Request $Request,string $id)
    {
        $university = University::findOrFail($id);
        $university->faculties()->detach($Request->faculty);
        return redirect()->back()->with('msg', 'Faculty removed successfully');
    }

    public function faculties(string $id)
    {
        $university = University::findOrFail($id);
        $faculties = Faculty::get();
        return view('dashboard.universities.faculties', compact('university', 'faculties'));
    }
}
