<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\University;
use App\Http\Resources\UniversityResource;
use App\Http\Requests\Admin\UniversityRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::get();
        if(count($universities) > 0){
            $universities = UniversityResource::collection($universities);
            return ApiHelper::getResponse(200, 'Universities found', $universities);
        }else{
            return ApiHelper::getResponse(200, 'Universities not found');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UniversityRequest $request)
    {
        $data = $request->validated();
        $university = University::create($data);
        if($university){
            $university = new UniversityResource($university);
            return ApiHelper::getResponse(201, 'University created', $university);
        }else{
            return ApiHelper::getResponse(200, 'University not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $university = University::find($id);
        if($university){
            $university= new UniversityResource($university);
            return ApiHelper::getResponse(200, 'University found', $university);
        }else{
            return ApiHelper::getResponse(200, 'University not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $university = University::find($id);
        if($university){
            $university->update($data);
            $university = new UniversityResource($university);
            return ApiHelper::getResponse(200, 'University updated', $university);
        }else{
            return ApiHelper::getResponse(200, 'University not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $university = University::find($id);
        if($university){
            $university->delete();
            return ApiHelper::getResponse(200, 'University deleted');
        }else{
            return ApiHelper::getResponse(200, 'University not found');
        }
    }
}
