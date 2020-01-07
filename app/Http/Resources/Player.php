<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Player extends JsonResource
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
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'form' => $this->form,
            'total_points' => $this->total_points,
            'influence' => $this->influence,
            'creativity' => $this->creativity,
            'threat' => $this->threat,
            'ict_index' => $this->ict_index,
        ];
    }
}
