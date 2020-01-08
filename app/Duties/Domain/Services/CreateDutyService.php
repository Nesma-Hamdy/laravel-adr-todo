<?php

namespace App\Duties\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Duties\Domain\Repositories\DutyRepository;

class CreateDutyService extends Service
{
    protected $duties;

    public function __construct(DutyRepository $duties)
    {
        $this->duties = $duties;
    }

    public function handle($data = [])
    {

        $user = $this->duties->create($data);

        return new GenericPayload($user);
    }
}