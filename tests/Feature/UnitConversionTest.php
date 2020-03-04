<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\IndexTest;

class UnitConversionTest extends IndexTest
{
    protected $uri = "/api/unit-conversions";
    
    protected $model = "App\UnitConversion";
    
    protected $contract = "App\Contracts\UnitConversionContract";

}
