<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Faculty;
use App\Http\Resources\FacultyResource;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::get();
        if(count($faculties) > 0){
            $faculties = FacultyResource::collection($faculties);
            return ApiHelper::getResponse(200, 'Faculties found', $faculties);
        }else{
            return ApiHelper::getResponse(200, 'Faculties not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $faculty = Faculty::create($data);
        if($faculty){
            $faculty = new FacultyResource($faculty);
            return ApiHelper::getResponse(201, 'Faculty created', $faculty);
        }else{
            return ApiHelper::getResponse(200, 'Faculty not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::find($id);
        if($faculty){
            $faculty= new FacultyResource($faculty);
            return ApiHelper::getResponse(200, 'Faculty found', $faculty);
        }else{
            return ApiHelper::getResponse(200, 'Faculty not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $faculty = Faculty::find($id);
        if($faculty){
            $faculty->update($data);
            $faculty = new FacultyResource($faculty);
            return ApiHelper::getResponse(200, 'Faculty updated', $faculty);
        }else{
            return ApiHelper::getResponse(200, 'Faculty not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = Faculty::find($id);
        if($faculty){
            $faculty->delete();
            return ApiHelper::getResponse(200, 'Faculty deleted');
        }else{
            return ApiHelper::getResponse(200, 'Faculty not found');
        }
    }
}
