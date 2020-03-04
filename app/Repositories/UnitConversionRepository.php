<?php

namespace App\Repositories;
use App\Repositories\CrudRepository;
use App\Contracts\UnitConversionContract;
use App\UnitConversion;

class UnitConversionRepository extends CrudRepository implements UnitConversionContract
{
    public function __construct(UnitConversion $model)
    {
        $this->model = $model;
    }
}