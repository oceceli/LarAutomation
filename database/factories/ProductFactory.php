<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Unit;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'unit_id' => factory(Unit::class)->create()->id,
        'unit_amount' => 1,
        'code' => $faker->countryCode,
        'name' => $faker->city,
        'barcode' => $faker->ean13,
        'min_threshold' => 10,
        'shelf_life' => 2,
        'note' => $faker->paragraph(1),
        'is_active' => $faker->boolean(),
    ];
});
