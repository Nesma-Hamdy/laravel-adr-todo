<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Requests\DutyFormRequest;
use App\Duties\Domain\Services\CreateDutyService;
use App\Duties\Responders\CreateDutyResponder;

class CreateDutyAction
{
    public function __construct(CreateDutyResponder $responder, CreateDutyService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(DutyFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}