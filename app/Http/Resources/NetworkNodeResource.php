<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NetworkNodeResource extends JsonResource
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
            'address' => $this->address,
            'enable_embb' => $this->enable_embb,
            'enable_mmtc' => $this->enable_mmtc,
            'enable_urllc' => $this->enable_urllc,
        ];
    }
}
