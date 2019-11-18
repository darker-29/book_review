<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'evaluation' => $faker->numberBetween(1, 5),
        'content' => $faker->text(),
        'ISBN' => $faker->isbn13(),
    ];
});
