<?php

namespace Tests\Unit;

use App\Unit;
use App\Product;
use Tests\TestCase;
use App\UnitConversion;
use Tests\Unit\Facades\RelationTest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;


    // Relational Tests

    
    /**
     * @test
     */
    public function a_product_can_have_one_or_multiple_unit_conversions_class()
    {
        RelationTest::hasMany(Product::class, UnitConversion::class);
    }

    /**
     * @test
     */
    public function a_product_belongs_to_unit_class()
    {
        RelationTest::belongsTo(Unit::class, Product::class);
    }

    


}