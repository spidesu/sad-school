<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'specialization' => DicResource::make($this->specialization),
            'course' => DicResource::make($this->specialization->course),
            'students' => StudentResource::collection($this->students),
            'teachers' => TeacherResource::collection($this->teachers),
            'student_count' => count($this->students),
        ];
    }
}
