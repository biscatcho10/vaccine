<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EligabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->page_title,
            'eligapilities' => $this->eligapilities
        ];
    }
}
