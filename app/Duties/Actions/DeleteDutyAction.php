<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Services\DeleteDutyService;
use App\Duties\Responders\DeleteDutyResponder;

class DeleteDutyAction
{
    public function __construct(DeleteDutyResponder $responder, DeleteDutyService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke($id)
    {
        return $this->responder->withResponse(
            $this->services->handle($id)
        )->respond();
    }
}