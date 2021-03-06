<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;
use App\City;
use App\User;
$factory->define(Image::class, function (Faker $faker) {
    return [
        
        'path' =>  $faker->imageUrl(),
        'imageable_type' => $faker->randomElement(['App\User','App\City']),
        'imageable_id' => $faker->numberBetween(1,3),
        
    ];
});
