<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'definded_period' => $this->definded_period,
            'has_diff_ages' => $this->has_diff_ages,
            'days' => DayResource::collection($this->days),
            'weekends' => $this->getWeekends(),
            'conditions' => new ConditionsResource($this->condition),
            'eligapilities' => new EligabilityResource($this->eligapility),
        ];

        if ($this->exceptionsd->count() > 0) {
            foreach ($this->exceptionsd->pluck('date')->toArray() as $date) {
                $newExcp[] = Carbon::parse($date)->format('j-n-Y');
            }
            $data['exceptions'] = $newExcp;
        }

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
