<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Models\Duty;
use App\Duties\Responders\DeleteDutyResponder;
use App\Duties\Domain\Services\DeleteDutyService;

class DeleteDutyAction
{
    public function __construct(DeleteDutyResponder $responder, DeleteDutyService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(Duty $duty)
    {
        return $this->responder->withResponse(
            $this->services->handle($duty)
        )->respond();
    }
}