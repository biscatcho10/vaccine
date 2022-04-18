<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'question' => $this->question,
            'input_type' => $this->input_type,
        ];
        if ($this->input_type == "select") {
            $data['select_type'] = $this->select_type;
            $data['options'] = $this->options;
        }
        return $data;
    }
}
