<?php

namespace App\Http\Controllers;

use App\Contracts\UnitConversionContract;
use Illuminate\Http\Request;

class UnitConversionController extends Controller
{
    public function __construct(UnitConversionContract $repository)
    {
        $this->repository = $repository;
    }
}
