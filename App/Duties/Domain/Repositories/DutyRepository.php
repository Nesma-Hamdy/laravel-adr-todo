<?php

namespace App\Duties\Domain\Repositories;
use Duty;

class DutyRepository extends Repository
{
    protected $model;

    public function __construct(Duty $model)
    {
        $this->model = $model;
    }
}
