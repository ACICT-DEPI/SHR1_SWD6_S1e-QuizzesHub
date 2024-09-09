<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UniversityRequest;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= University::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UniversityRequest $request)
    {
        University::create([
            'name' => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $university = University::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $university = University::findOrFail($id);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $university = University::findOrFail($id);
        $university->delete();
    }

    public function archive()
    {
        $data=University::onlyTrashed()->get();
        // return view('admin.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        University::withTrashed()->where('id', $id)->restore();
        // return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $university=University::withTrashed()->where('id', $id)->first();
        $university->forceDelete();
        // return redirect()->back()->with('msg', 'User deleted permanently');
    }
}
