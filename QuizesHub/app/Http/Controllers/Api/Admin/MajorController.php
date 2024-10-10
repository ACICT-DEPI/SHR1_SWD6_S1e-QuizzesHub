<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Major;
use App\Http\Resources\MajorResource;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::get();
        if(count($majors) > 0){
            $majors = MajorResource::collection($majors);
            return ApiHelper::getResponse(200, 'Majors found', $majors);
        }else{
            return ApiHelper::getResponse(200, 'Majors not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $major = Major::create($data);
        if($major){
            $major = new MajorResource($major);
            return ApiHelper::getResponse(201, 'Major created', $major);
        }else{
            return ApiHelper::getResponse(200, 'Major not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $major = Major::find($id);
        if($major){
            $major= new MajorResource($major);
            return ApiHelper::getResponse(200, 'Major found', $major);
        }else{
            return ApiHelper::getResponse(200, 'Major not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $major = Major::find($id);
        if($major){
            $major->update($data);
            $major = new MajorResource($major);
            return ApiHelper::getResponse(200, 'Major updated', $major);
        }else{
            return ApiHelper::getResponse(200, 'Major not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Major::find($id);
        if($major){
            $major->delete();
            return ApiHelper::getResponse(200, 'Major deleted');
        }else{
            return ApiHelper::getResponse(200, 'Major not found');
        }
    }
}
