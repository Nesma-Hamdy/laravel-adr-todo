<?php
namespace App\Duties\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Duties\Domain\Models\Duty;

class DutyRepository extends Repository
{
    protected $model;

    public function __construct(Duty $model)
    {
        $this->model = $model;
    }
}