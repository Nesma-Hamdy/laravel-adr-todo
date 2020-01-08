<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Requests\DutyFormRequest;
use App\Duties\Domain\Services\EditDutyService;
use App\Duties\Responders\EditDutyResponder;

class EditDutyAction
{
    public function __construct(EditDutyResponder $responder, EditDutyService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke($id, DutyFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($id, $request->all())
        )->respond();
    }
}