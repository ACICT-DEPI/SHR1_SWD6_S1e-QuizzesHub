<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Role::get();
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
    public function store(RoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    public function archive()
    {
        $data=Role::onlyTrashed()->get();
        // return view('admin.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        Role::withTrashed()->where('id', $id)->restore();
        // return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $role=Role::withTrashed()->where('id', $id)->first();
        $role->forceDelete();
        // return redirect()->back()->with('msg', 'User deleted permanently');
    }
}
