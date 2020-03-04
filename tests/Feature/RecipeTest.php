<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\IndexTest;

class RecipeTest extends IndexTest
{
    protected $uri = "/api/recipes";

    protected $model = "App\Recipe";

    protected $contract = "App\Contracts\RecipeContract";
}