<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Models\Duty;
use App\Duties\Responders\EditDutyResponder;
use App\Duties\Domain\Requests\DutyFormRequest;
use App\Duties\Domain\Services\EditDutyService;

class EditDutyAction
{
    public function __construct(EditDutyResponder $responder, EditDutyService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(Duty $duty, DutyFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($duty, $request->validated())
        )->respond();
    }
}