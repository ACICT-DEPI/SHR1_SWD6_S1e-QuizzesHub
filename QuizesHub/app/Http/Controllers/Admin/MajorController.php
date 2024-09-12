<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\major;
use App\Http\Requests\Admin\MajorRequest;

class MajorController extends Controller
{
    public function index()
    {
       $data=Major::all();
       return view('dashboard.majors.index',compact('data'));
    }
    public function create()
    {
        return view('dashboard.majors.create');
    }
    public function store(MajorRequest $request)
    {
        Major::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('msg','major added successfully..');
    }
    public function show(string $id)
    {
        $major=Major::findorfail($id);
        return view('dashboard.majors.show',compact('major'));
    }
    public function edit(string $id)
    {
        $major=Major::findorfail($id);
        return view('dashboard.majors.edit',compact('major'));
    }
    public function update(MajorRequest $request, string $id)
    {
        $major=Major::findorfail($id);
        $major->update([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('messege','major updated successfully..');
    }
    public function destroy(string $id)
    {
        $major=Major::findorfail($id);
        $major->delete();
        return redirect()->back()->with('messege','major deleted successfully..');
    }
    public function archive(){
        $data =major::onlyTrashed()->get();
        return view('dashboard.majors.archive',compact('data'));
    }
    public function forceDelete(string $id)
    {
        $major=Major::withTrashed()->where('id', $id)->first();
        $major->forceDelete();
        return redirect()->back()->with('msg', 'Major deleted permanently');
    }
    public function restore(string $id)
    {
        Major::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.universities.index')->with('msg', 'Major restored successfully');
    }
}
