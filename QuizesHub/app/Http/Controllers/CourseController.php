<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;


class CourseController extends Controller
{
    public function index()
    {   
       $CourseData=course::all();
       return $CourseData;
       //return view('admin.index',compact('CourseData'));
    }
    public function create()
    {  
        //return view('admin.create');
        return "create";
    }
    public function store(CourseRequest $request)
    {
        $validatedData=$request->validate();
        course::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'code'=>$request->code,
            'major_id'=>$request->major_id,

        ]);
        // return redirect()->back()->with('messege','Course added successfully..');
        return "store";
    }
    public function show(string $id)    
    {
        $CourseData=course::findorfail($id);
        // return view('admin.show',compact('CourseData'));
        return "show";
    }
    public function edit(string $id)
    {
       $CourseData=course::findorfail($id);
    //    return view('admin.update',compact('CourseData'));
        return "edit";
    }
    public function update(CourseRequest $request, string $id)
    {
        $request->validate();
        course::findorfail($id)->update([
            'name'=>$request->name,
            'code'=>$request->code,
            'major_id'=>$request->major_id,
        ]);
        // return redirect()->back()->with('messege','Course updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        course::findorfail($id)->delete();
        // return redirect()->back()->with('messege',' Course deleted successfully..');
        return "destroy";
    }
    public function archive(){
       $CourseData=course::onlyTrashed()->get();
        // return view('admin.archive',compact('CourseData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        course::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','Course deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        course::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','Course deleted successfully..');
        return "restore";
    }
   
}
