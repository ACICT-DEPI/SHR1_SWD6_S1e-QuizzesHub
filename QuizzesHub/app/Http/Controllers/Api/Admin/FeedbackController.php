<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Feedback;
use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::get();
        if(count($feedbacks) > 0){
            $feedbacks = FeedbackResource::collection($feedbacks);
            return ApiHelper::getResponse(200, 'Feedbacks found', $feedbacks);
        }else{
            return ApiHelper::getResponse(200, 'Feedbacks not found');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $feedback = Feedback::create($data);
        if($feedback){
            $feedback = new FeedbackResource($feedback);
            return ApiHelper::getResponse(201, 'Feedback created', $feedback);
        }else{
            return ApiHelper::getResponse(200, 'Feedback not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::find($id);
        if($feedback){
            $feedback= new FeedbackResource($feedback);
            return ApiHelper::getResponse(200, 'Feedback found', $feedback);
        }else{
            return ApiHelper::getResponse(200, 'Feedback not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();
        $feedback = Feedback::find($id);
        if($feedback){
            $feedback->update($data);
            $feedback = new FeedbackResource($feedback);
            return ApiHelper::getResponse(200, 'Feedback updated', $feedback);
        }else{
            return ApiHelper::getResponse(200, 'Feedback not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::find($id);
        if($feedback){
            $feedback->delete();
            return ApiHelper::getResponse(200, 'Feedback deleted');
        }else{
            return ApiHelper::getResponse(200, 'Feedback not found');
        }
    }
}
