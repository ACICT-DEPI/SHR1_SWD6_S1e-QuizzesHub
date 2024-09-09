<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= Admin::get();
        //return view('admin.users.index', compact('data'));
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
    public function store(AdminRequest $request)
    {
        Admin::create([
            'user_id' => $request->user_id,
            'permission' => $request->permission,
        ]);
        // return redirect()->back()->with('msg', 'Admin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        // return view('admin.users.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        // return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'user_id' => $request->user_id,
            'permission' => $request->permission,
        ]);
        // return redirect()->back()->with('msg', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        // return redirect()->back()->with('msg', 'Admin deleted successfully');
    }

    public function archive()
    {
        $data=Admin::onlyTrashed()->get();
        // return view('admin.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        Admin::withTrashed()->where('id', $id)->restore();
        // return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $admin=Admin::withTrashed()->where('id', $id)->first();
        $admin->forceDelete();
        // return redirect()->back()->with('msg', 'User deleted permanently');
    }
}
