<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Level;
use App\Http\Resources\LevelResource;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::get();
        if(count($levels) > 0){
            $levels = LevelResource::collection($levels);
            return ApiHelper::getResponse(200, 'Levels found', $levels);
        }else{
            return ApiHelper::getResponse(200, 'Levels not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $level = Level::create($data);
        if($level){
            $level = new LevelResource($level);
            return ApiHelper::getResponse(201, 'Level created', $level);
        }else{
            return ApiHelper::getResponse(200, 'Level not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $level = Level::find($id);
        if($level){
            $level= new LevelResource($level);
            return ApiHelper::getResponse(200, 'Level found', $level);
        }else{
            return ApiHelper::getResponse(200, 'Level not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $level = Level::find($id);
        if($level){
            $level->update($data);
            $level = new LevelResource($level);
            return ApiHelper::getResponse(200, 'Level updated', $level);
        }else{
            return ApiHelper::getResponse(200, 'Level not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $level = Level::find($id);
        if($level){
            $level->delete();
            return ApiHelper::getResponse(200, 'Level deleted');
        }else{
            return ApiHelper::getResponse(200, 'Level not found');
        }
    }
}
