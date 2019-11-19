<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'ISBN' => $faker->isbn13(),
        'title' => $faker->word(),
        'image' => Str::random(20),
        'author' => $faker->name(),
=======
        'ISBN'    => $faker->ean13(),
        'title'   => $faker->word(),
        'image'   => Str::random(20),
        'author'  => $faker->name(),
>>>>>>> 7098f1cc3bc37baad707eded095315fd12194d59
        'summary' => $faker->text(),
    ];
});
