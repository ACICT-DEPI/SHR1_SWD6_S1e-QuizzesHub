<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use App\Models\faculty;


class CourseController extends Controller
{
    public function index()
    {   
        $CourseData = Course::with('major')->get();
       return view('dashboard.course.index',compact('CourseData'));
       
    }
    public function create()
    {  
        $CourseData = Course::with('major')->get();
       
        return view('dashboard.course.create',compact('CourseData'));
        
    }
    public function store(CourseRequest $request)
    {
        
        $validatedData=$request->validated();
        course::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'major_id'=>$request->major_id,

        ]);
         return redirect()->back()->with('messege','Course added successfully..');
       
    }
    public function show(string $id)    
    {
        $CourseData=course::findorfail($id);
         return view('dashboard.course.show',compact('CourseData'));
       
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
    //    $CourseData=course::onlyTrashed()->get();
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
