<?php

namespace App\Duties\Domain\Requests;

use App\App\Http\Requests\APIRequest;

class DutyFormRequest extends APIRequest
{

    public function rules()
    {
        return [
            'duty' => 'required|min:10|string',
            'is_completed' => 'boolean'
        ];
    }
}