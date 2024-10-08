<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\User;
use App\Models\Admin\University;
use App\Models\Admin\Faculty;
use App\Models\Admin\Feedback;
use App\Models\Admin\Major;
use App\Models\Admin\Level;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= User::get();
        return view('dashboard.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = University::get();
        $faculties = Faculty::get();
        $majors = Major::get();
        $levels = Level::get();
        return view('dashboard.users.create', compact('universities', 'faculties', 'majors', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // return $request->all();
        $file = $request->file('image_path');
        if(empty($file)){
            $photo = null;
        }else{
            $photoExt = $file->getClientOriginalExtension();
            $photoName = $request->username . '.' . $photoExt;
            $photo = $file->storeAs('images/users', $photoName);
        }
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'image_path' => $photo,
            'gender' => $request->gender,
            // 'role' => $request->role,
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
        if($user->role == 'owner' && Auth::user()->role != 'owner'){
            return redirect()->back()->with('msg', 'You are not allowed to access this page');
        }
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        if($user->role == 'owner' && Auth::user()->role != 'owner'){
            return redirect()->back()->with('msg', 'You are not allowed to access this page');
        }
        $universities = University::get();
        $faculties = Faculty::get();
        $majors = Major::get();
        $levels = Level::get();
        return view('dashboard.users.edit', compact('user', 'universities', 'faculties', 'majors', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        // return $request->all();
        $file = $request->file('image_path');
        if( !empty($student->image_path) && !empty($file) && Storage::exists($user->image_path)  ){
            Storage::delete($user->image_path);
            if(empty(Storage::files('images/users'))){
                Storage::deleteDirectory('images/users');
            }
            $photoExt = $file->getClientOriginalExtension();
            $photoName = $user->username . '.' . $photoExt;
            $photo = $file->storeAs('images/users', $photoName);
        }elseif(!empty($file)){
            $photoExt = $file->getClientOriginalExtension();
            $photoName = $user->username . '.' . $photoExt;
            $photo = $file->storeAs('images/users', $photoName);
        }else{
            $photo = $user->photo;
        }
        if(empty($request->password)){
            $password= $user->password;
        }else{
            $password= bcrypt($request->password);
        }
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'phone' => $request->phone,
            'image_path' => $photo,
            'gender' => $request->gender,
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'level_id' => $request->level_id,
        ]);
        return redirect()->back()->with('msg', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if($user->role == 'owner' && Auth::user()->role != 'owner'){

            return redirect()->back()->with('msg', 'You are not allowed to access this page');

        }
        if($user->role == 'owner' && Auth::user()->role == 'owner'){
            if($user->id == Auth::user()->id){
                return redirect()->back()->with('msg', 'You are not allowed to access this page');
            }
        }
        $user->delete();
        $user->feedbacks()->delete();
        return redirect()->back()->with('msg', 'User deleted successfully');
    }

    public function archive()
    {
        $data=User::onlyTrashed()->get();
        return view('dashboard.users.archive', compact('data'));
    }

    public function restore(string $id)
    {
        User::withTrashed()->where('id', $id)->restore();
        Feedback::withTrashed()->where('user_id', $id)->restore();
        return redirect()->route('admin.users.index')->with('msg', 'User restored successfully');
    }

    public function forceDelete(string $id)
    {
        $user=User::withTrashed()->where('id', $id)->first();
        if(!empty($user->image_path) && Storage::exists($user->image_path) ){
            Storage::delete($user->image_path);
            if(empty(Storage::files('images/users'))){
                Storage::deleteDirectory('images/users');
            }
        }
        $user->feedbacks()->forceDelete();
        $user->forceDelete();
        return redirect()->back()->with('msg', 'User deleted permanently');
    }

    public function editRole(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.editRole', compact('user'));
    }

    public function updateRole(Request $request, string $id)
    {
        // return $request->all();
        $user = User::findOrFail($id);
        $user->update([
            'role' => $request->role,
        ]);
        return redirect()->back()->with('msg', 'Role updated successfully');
    }

}
