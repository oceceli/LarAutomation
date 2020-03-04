<?php

namespace App\Repositories;

use App\Contracts\UnitContract;
use App\Unit;

class UnitRepository extends CrudRepository implements UnitContract
{

    public function __construct(Unit $unit)
    {
        $this->model = $unit;
    }


}