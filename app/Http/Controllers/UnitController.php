<?php

namespace App\Http\Controllers;
use App\Contracts\UnitContract;

class UnitController extends Controller
{
    

    public function __construct(UnitContract $repository)
    {
        $this->repository = $repository;
    }

    

}
