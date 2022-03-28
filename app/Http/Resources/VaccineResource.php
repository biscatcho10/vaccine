<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'name' => $this->name,
            'exceptions' => $this->exceptionsd->pluck('date')->toArray(),
            'definded_period' => $this->definded_period,
            'has_diff_ages' => $this->has_diff_ages,
            'days' => DayResource::collection($this->days),
            'weekends' => $this->getWeekends(),
            'conditions' => new ConditionsResource($this->condition),
            'eligapilities' => new EligabilityResource($this->eligapility),
        ];

        if ($this->definded_period) {
            $data['from'] = $this->from;
            $data['to'] = $this->to;
        }

        if ($this->has_diff_ages) {
            $data['diff_ages'] = $this->diff_ages;
        }

        return $data;
    }
}
