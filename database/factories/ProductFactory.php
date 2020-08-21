<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->randomDigit,
        'suplier_id' => $faker->randomDigit,
        'price' => $faker->randomNumber(),
        'price_discount' => $faker->randomNumber(),
        'description' => $faker->text,
        'weight_available' => $faker->randomFloat(),
    ];
});
