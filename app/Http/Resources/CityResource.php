<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'city_id' => $this->id,
            'province_id' => $this->province_id,
            'type' => $this->type,
            'city_name' => $this->city_name,
            'postal_code' => $this->postal_code,
        ];
    }
}
