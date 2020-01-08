<?php

namespace App\Duties\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Duties\Domain\Repositories\DutyRepository;

class DeleteDutyService extends Service
{
    protected $duties;
    public function __construct(DutyRepository $duties)
    {
        $this->duties = $duties;
    }
    public function handle($id = null)
    {
        if ($this->duties->delete($id)) {
            return new GenericPayload([
                'message' => 'Duty Has been deleted successfully !',
            ], 200);
        }

        return new GenericPayload([
            'message' => 'Something wrong try again later !',
        ], 422);
    }
}