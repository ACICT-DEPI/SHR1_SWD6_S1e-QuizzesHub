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

       return $LevelData;
    //    return $LevelData;

    //    return view('dashboard.levels.index',compact('LevelData'));
    }
    public function create()
    {
        //return view('admin.create');
        return "create";
    }
    public function store(LevelRequest $request)
    {
        $validatedData=$request->validate();
        level::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        // return redirect()->back()->with('messege','level added successfully..');
        return "store";
    }
    public function show(string $id)
    {
        $LevelData=level::findorfail($id);
        // return view('admin.show',compact('LevelData'));
        return "show";
    }
    public function edit(string $id)
    {
       $LevelData=level::findorfail($id);
    //    return view('admin.update',compact('LevelData'));
        return "edit";
    }
    public function update(LevelRequest $request, string $id)
    {
        $request->validate();
        level::findorfail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        // return redirect()->back()->with('messege','level updated successfully..');
        return "update";
    }
    public function destroy(string $id)
    {
        level::findorfail($id)->delete();
        // return redirect()->back()->with('messege','  level deleted successfully..');
        return "destroy";
    }
    public function archive(){
       $LevelData =level::onlyTrashed()->get();
        // return view('admin.archive',compact('LevelData'));
        return "archive";
    }
    public function forceDelet(string $id)
    {
        level::onlyTrashed()->findorfail($id)->forceDelete();
        // return redirect()->back()->with('messege','level deleted successfully..');
        return "forceDelet";
    }
    public function restore(string $id)
    {
        level::onlyTrashed()->findorfail($id)->restore();
        // return redirect()->back()->with('messege','level deleted successfully..');
        return "restore";
    }
}
