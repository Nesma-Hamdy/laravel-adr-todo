<?php

namespace App\Duties\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Duties\Domain\Repositories\DutyRepository;
class IndexDutyService extends Service 
{
    protected $duties;
    public function __construct(DutyRepository $duties) 
    {
        $this->duties = $duties;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->duties->all());
    }
}