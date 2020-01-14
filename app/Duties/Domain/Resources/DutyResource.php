<?php

namespace App\Duties\Domain\Resources;

use App\App\Http\Resources\BaseResource;

class DutyResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'user_id' => $this->user_id,
            'is_completed' => $this->isCompleted(),
            'duty' => $this->duty,
        ], parent::toArray($request));
    }
}