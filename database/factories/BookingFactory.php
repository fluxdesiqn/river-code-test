<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Booking::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'date' => $faker->date(),
        'time' => $faker->time(),
        'message' => $faker->text(200)
    ];
});
