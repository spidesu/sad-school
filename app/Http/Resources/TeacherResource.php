<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'gender' => DicResource::make($this->gender),
            'birth_date' => $this->birth_date,
            'disability' => DicResource::make($this->disability),
            'education' => DicResource::make($this->education),
            'address_reg' => $this->address_reg,
            'address_act' => $this->address_act,
            'specialization' => DicResource::make($this->specialization),
            'parttime_work' => $this->parttime_work,
            'working_rate' => $this->working_rate,
            'work_since' => $this->work_since,
            'phone' => $this->phone
        ];
    }
}
