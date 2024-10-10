<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Exam;
use App\Http\Resources\ExamResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::get();
        if(count($exams) > 0){
            $exams = ExamResource::collection($exams);
            return ApiHelper::getResponse(200, 'Exams found', $exams);
        }else{
            return ApiHelper::getResponse(200, 'Exams not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $exam = Exam::create($data);
        if($exam){
            $exam = new ExamResource($exam);
            return ApiHelper::getResponse(201, 'Exam created', $exam);
        }else{
            return ApiHelper::getResponse(200, 'Exam not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::find($id);
        if($exam){
            $exam= new ExamResource($exam);
            return ApiHelper::getResponse(200, 'Exam found', $exam);
        }else{
            return ApiHelper::getResponse(200, 'Exam not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $exam = Exam::find($id);
        if($exam){
            $exam->update($data);
            $exam = new ExamResource($exam);
            return ApiHelper::getResponse(200, 'Exam updated', $exam);
        }else{
            return ApiHelper::getResponse(200, 'Exam not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        if($exam){
            $exam->delete();
            return ApiHelper::getResponse(200, 'Exam deleted');
        }else{
            return ApiHelper::getResponse(200, 'Exam not found');
        }
    }
}
