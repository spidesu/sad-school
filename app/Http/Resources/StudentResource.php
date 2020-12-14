<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'health_group' => DicResource::make($this->health_group),
            'medical_doc_fact' => $this->medical_doc_fact,
            'address_reg' => $this->address_reg,
            'address_act' => $this->address_act,
            'comment' => $this->comment,
            'disability' => DicResource::make($this->disability),
            'representatives' => RepresentativeDicResource::collection($this->representatives),
        ];
    }
}
