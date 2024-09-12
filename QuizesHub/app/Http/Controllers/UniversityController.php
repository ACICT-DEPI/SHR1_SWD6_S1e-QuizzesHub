<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UniversityRequest;
use App\Models\University;
use App\Models\Faculty;

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
        return view('dashboard.universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $university = University::findOrFail($id);
        return view('dashboard.universities.edit', compact('university'));
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
        return redirect()->route('admin.universities.index')->with('msg', 'University restored successfully');
    }

    public function forceDelete(string $id)
    {
        $university=University::withTrashed()->where('id', $id)->first();
        $university->forceDelete();
        return redirect()->back()->with('msg', 'University deleted permanently');
    }
}
