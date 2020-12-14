<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RepresentativeDicResource extends JsonResource
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
            'full_name' => $this->last_name. ' '. $this->first_name. ' '. $this->middle_name,
        ];
    }
}
