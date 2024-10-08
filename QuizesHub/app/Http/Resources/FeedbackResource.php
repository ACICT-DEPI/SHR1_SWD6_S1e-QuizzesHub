<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'feedback_id' => $this->id,
            'feedback_content' => $this->comments,
            'feedback_rating' => $this->rating,
            'feedback_user_name' => $this->user->fname.' '.$this->user->lname,
            'feedback_user_id' => $this->user->id,
            'feedback_exam_course' => $this->exam->course->course->code,
        ];
    }
}
