<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'university_id' => $this->id,
            'university_name' => $this->name,
            'university_faculties' => $this->faculties->pluck('id','name'),
        ];
    }
}
