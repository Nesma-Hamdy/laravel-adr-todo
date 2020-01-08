<?php

namespace App\Duties\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DutyResource extends JsonResource
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
            'user_id' => $this->user_id,
            'is_completed' => $this->isCompleted(),
            'duty' => $this->duty,
        ];
    }
}