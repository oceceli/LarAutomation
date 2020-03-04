<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UnitConversion;
use Faker\Generator as Faker;

$factory->define(UnitConversion::class, function (Faker $faker) {
    return [
        'unit_id' => factory(App\Unit::class)->create()->id,
        'product_id' => factory(\App\Product::class),
        'calc_operator' => '*',
        'amount' => rand(5,50),
    ];
});
