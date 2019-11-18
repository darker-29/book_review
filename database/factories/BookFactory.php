<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'ISBN' => $faker->ean13(),
        'title' => $faker->word(),
        'image' => Str::random(20),
        'author' => $faker->name(),
        'summary' => $faker->text(),
    ];
});
