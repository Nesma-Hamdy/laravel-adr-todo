<?php

namespace App\Duties\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Duties\Domain\Resources\DutyResource;

class IndexDutyResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return DutyResource::collection($this->response->getData());

    }
}