<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Admin\faculty;
use App\Models\Admin\major;
use App\Models\Admin\CourseFacultyMajor;



class CourseController extends Controller
{
    public function index()
    {
        $CourseData = Course::get();

        return view('dashboard.course.index',compact('CourseData'));

    }
    public function create()
    {
        $CourseData = Course::get();
        $AllMajors=major::select('id','name')->distinct()->get();
        $AllFaculties=faculty::select('id','name')->distinct()->get();

   return view('dashboard.course.create',compact('CourseData','AllMajors','AllFaculties'));

    }
    public function store(CourseRequest $request)
    {
            
        $validatedData=$request->validated();
      
        course::create([
            'name'=>$request->name,
            'code'=>$request->code,
        ]);
        $Course_id=course::where('name',$request->name)->first()->id;
        CourseFacultyMajor::create([
            'course_id'=>$Course_id,
            'major_id'=>$request->major_id,
            'faculty_id'=>$request->faculty_id,
            'degree'=>$request->degree,
        ]);
         return redirect()->back()->with('messege','Course added successfully..');

    }
    public function show(string $id)
    {
        $CourseData=course::findorfail($id);
         $CourseInfo=CourseFacultyMajor::where('course_id',$id)->get();
         return view('dashboard.course.show',compact('CourseData','CourseInfo'));

    }
    public function edit(string $id)
    {
       $CourseData=course::findorfail($id);
       $AllMajors=major::select('id','name')->distinct()->get();
       $AllFaculties=faculty::select('id','name')->distinct()->get();
       $CourseInfo=CourseFacultyMajor::where('course_id',$id)->get();
      
        return view('dashboard.course.edit',compact('CourseData','AllMajors','AllFaculties','CourseInfo'));

    }
    public function update(CourseRequest $request, string $id)
    {

         $request->validated();
    
        course::findorfail($id)->update([
            'name'=>$request->name,
            'code'=>$request->code,
        ]);
        
        CourseFacultyMajor::where('course_id',$id)->update([
            'course_id'=>$id,
            'major_id'=>$request->major_id,
            'faculty_id'=>$request->faculty_id,
        ]);
       return redirect()->back()->with('messege','Course updated successfully..');

    }
    public function destroy(string $id)
    {
         course::findorfail($id)->delete();
         return redirect()->back()->with('messege',' Course deleted successfully..');

    }
    public function archive(){
     $CourseData=course::onlyTrashed()->get();
   return view('dashboard.course.archive',compact('CourseData'));

    }
    public function forceDelete(string $id)
    {

        course::onlyTrashed()->findorfail($id)->forceDelete();
return redirect()->back()->with('messege','Course deleted successfully..');

    }
    public function restore(string $id)
    {
        course::onlyTrashed()->findorfail($id)->restore();
        return redirect()->back()->with('messege','Course restored successfully..');
        return "restore";
    }

}
