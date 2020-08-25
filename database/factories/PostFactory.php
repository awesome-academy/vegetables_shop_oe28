<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'intro' => $faker->text,
        'category_id' => $faker->randomDigit,
        'content' => $faker->text,
    ];
});
