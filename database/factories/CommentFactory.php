<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
       'content' => $faker->text(500),
       'rating' => $faker->numberBetween(1,5),
       'user_id' => $faker->numberBetween(1,3),
       'commentable_type' => $faker->randomElement(['App\Room','App\Image']),
       'commentable_id' => $faker->numberBetween(1,10),
     ];
});
