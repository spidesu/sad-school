<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SheetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mark' => $this->mark,
            'subject' => DicResource::make($this->subject),
            'quarter' => DicResource::make($this->quarter),
            'year' => $this->year,
        ];
    }
}
