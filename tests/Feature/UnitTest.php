<?php

namespace Tests\Feature;

use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\IndexTest;

class UnitTest extends IndexTest
{
    use RefreshDatabase;

    
    protected $uri = "/api/units";

    protected $model = "App\Unit";

    protected $contract = "App\Contracts\UnitContract";

}
