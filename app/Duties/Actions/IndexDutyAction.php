<?php

namespace App\Duties\Actions;

use App\Duties\Domain\Services\IndexDutyService;
use App\Duties\Responders\IndexDutyResponder;

class IndexDutyAction 
{
    public function __construct(IndexDutyResponder $responder, IndexDutyService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}