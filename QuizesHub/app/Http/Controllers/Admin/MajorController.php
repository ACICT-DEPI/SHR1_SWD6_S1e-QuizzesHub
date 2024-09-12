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
       $MajorData=major::all();
       return $MajorData;
       //return view('admin.index',compact('MajorData'));
    }
    public function create()
    {
        //return view('admin.create');
        return "create";
    }
    public function store(MajorRequest $request)
    {
        $validatedData=$request->validate();
        major::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'faculty_id'=>$request->faculty_id,

        ]);
        // return redirect()->back()->with('messege','major added successfully..');
        return "store";
    }
    public function show(string $id)
    {
        $MajorData=major::findorfail($id);
        // return view('admin.show',compact('MajorData'));
        return "show";
    }
    public function edit(string $id)
    {
       $MajorData=major::findorfail($id);
    //    return view('admin.update',compact('MajorData'));
        return "edit";
    }
    public function update(MajorRequest $request, string $id)
    {
        $request->validate();
        major::findorfail($id)->update([
            'name'=>$request->name,
            'faculty_id'=>$request->faculty_id,
        ]);
        // return redirect()->back()->with('messege','major updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        major::findorfail($id)->delete();
        // return redirect()->back()->with('messege','major deleted successfully..');
        return "destroy";
    }
    public function archive(){
       $MajorData =major::onlyTrashed()->get();
        // return view('admin.archive',compact('MajorData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        major::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','major deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        major::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','major deleted successfully..');
        return "restore";
    }
}
