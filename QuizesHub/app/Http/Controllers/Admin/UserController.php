<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= User::get();
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
    public function store(UserRequest $request)
    {
        $image=$request->file('image')->storeAs('public/uploads', $request->file('image')->getClientOriginalName());
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'image_path' => $image,
            'gender' => $request->gender,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'level_id' => $request->level_id,
        ]);
        return redirect()->back()->with('msg', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        // return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        // return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $image=$request->file('image')->storeAs('public/uploads', $request->file('image')->getClientOriginalName());
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'image_path' => $image,
            'gender' => $request->gender,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'level_id' => $request->level_id,
        ]);
        // return redirect()->back()->with('msg', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        // return redirect()->back()->with('msg', 'User deleted successfully');
    }

    public function archive()
    {
        $data=User::onlyTrashed()->get();
        // return view('admin.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        User::withTrashed()->where('id', $id)->restore();
        // return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $user=User::withTrashed()->where('id', $id)->first();
        if(Storage::exists($user->image_path) && !empty($user->image_path)){
            Storage::delete($user->image_path);
        }
        $user->forceDelete();
        // return redirect()->back()->with('msg', 'User deleted permanently');
    }
}
