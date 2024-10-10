<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'exam_id' => $this->id,
            'exam_course' => $this->course->course->code,
            'exam_course_name' => $this->course->course->name,
            'exam_course_degree' => $this->course->degree,
            'exam_faculty' => $this->course->faculty->name,
            'exam_university' => $this->course->university->name,
            'exam_questions' => $this->questions->count(),
        ];
    }
}
