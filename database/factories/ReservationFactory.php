<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(200,500),
       'check_in' => $faker->dateTimeBetween('-10 days','now'),
       'check_out' => $faker->dateTimeBetween('now','+10 days'),
       'user_id' => $faker->numberBetween(1,3),
       'room_id' => $faker->numberBetween(1,10),
       'city_id' => $faker->numberBetween(1,2)
    ];
});
