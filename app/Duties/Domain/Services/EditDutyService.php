<?php

namespace App\Duties\Domain\Services;

use App\App\Domain\Services\Service;
use App\App\Domain\Payloads\GenericPayload;

class EditDutyService extends Service
{

    public function handle($duty = null, $data = [])
    {
        if ($duty->update($data)) {
            return new GenericPayload([
                'message' => 'Duty Has been updated successfully !',
            ], 200);
        }

        return new GenericPayload([
            'message' => 'Something wrong try again later !',
        ], 422);
    }
}