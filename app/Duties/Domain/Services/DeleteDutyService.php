<?php

namespace App\Duties\Domain\Services;

use App\App\Domain\Services\Service;
use App\App\Domain\Payloads\GenericPayload;

class DeleteDutyService extends Service
{

    public function handle($duty = null)
    {
        if ($duty->delete()) {
            return new GenericPayload([
                'message' => 'Duty Has been deleted successfully !',
            ], 200);
        }

        return new GenericPayload([
            'message' => 'Something wrong try again later !',
        ], 422);
    }
}