<?php

namespace Tests\Feature;

use Tests\Feature\IndexTest;

// use Illuminate\Foundation\Testing\WithFaker;

class ProductTest extends IndexTest
{   

    protected $uri = "/api/products";

    protected $model = "App\Product";

    protected $contract = "App\Contracts\ProductContract";
        


}
