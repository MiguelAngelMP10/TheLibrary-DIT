<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(50),
        'author' => $faker->name,
        'publishedDate' => $faker->dateTime(),
        'category_id' => Category::all()->random()->id,
        'user_id' =>  User::all()->random()->id,
        'statusPrestamo' => false,
    ];
});