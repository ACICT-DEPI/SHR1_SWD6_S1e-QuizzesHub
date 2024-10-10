<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\level;
use App\Http\Requests\Admin\LevelRequest;
use App\Models\Admin\faculty;


class LevelController extends Controller
{
    public function index()
    {
       $LevelData=level::get();
     return view('dashboard.levels.index',compact('LevelData'));
    }
    public function create()
    {
        return view('dashboard.levels.create');
        
    }
    public function store(LevelRequest $request)
    {
        
        $validatedData=$request->validated();
        level::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
         return redirect()->back()->with('messege','level added successfully..');
        
    }
    public function show(string $id)
    {
        $LevelData=level::findorfail($id);
       return view('dashboard.levels.show',compact('LevelData'));
       
    }
    public function edit(string $id)
    {
       $LevelData=level::findorfail($id);
      return view('dashboard.levels.edit',compact('LevelData'));
        
    }
    public function update(LevelRequest $request, string $id)
    {
        $validatedData=$request->validated();
        level::findorfail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
       return redirect()->back()->with('messege','level updated successfully..');
    }
    public function destroy(string $id)
    {
        level::findorfail($id)->delete();
         return redirect()->back()->with('messege','  level deleted successfully..');
     
    }
    public function archive(){
       $LevelData =level::onlyTrashed()->get();
       return view('dashboard.levels.archive',compact('LevelData'));
       
    }
    public function forceDelete(string $id)
    {
        level::onlyTrashed()->findorfail($id)->forceDelete();
         return redirect()->back()->with('messege','level deleted successfully..');
       
    }
    public function restore(string $id)
    {
        level::onlyTrashed()->findorfail($id)->restore();
         return redirect()->back()->with('messege','level restored successfully..');
       
    }
}
