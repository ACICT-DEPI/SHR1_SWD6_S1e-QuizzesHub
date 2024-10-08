<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->id,
            'first_name' => $this->fname,
            'last_name' => $this->lname,
            'username' => $this->username,
            'user_email' => $this->email,
            'user_phone' => $this->phone,
            'user_image' => $this->image_path,
            'user_gender' => $this->gender,
            'university_id' => $this->university_id,
            'unibersty_name' => $this->university->name,
            'faculty_id' => $this->faculty_id,
            'faculty_name' => $this->faculty->name,
            'major_id' => $this->major_id,
            'major_name' => $this->major->name,
            'level_id' => $this->level_id,
        ];
    }
}
