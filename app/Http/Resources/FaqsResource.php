<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'question'      => $this->question,
            'answer'        => $this->answer,
            'status'        => ($this->isActive()) ? 'Active' : 'InActive',
            'created_at'    => $this->created_at->toDateString(),
        ];
    }
}
