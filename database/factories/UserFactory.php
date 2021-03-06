<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'company_id' => mt_rand(1,2),
        'email_verified_at' => now(),
        'password' => Hash::make('shah'), // password
        'meta' => [
            'settings'=> [
            'site_background' => 'black',
            'site_lang' => 'en'
        ],
        'skills'  => $faker->randomElements(['php','laravel','js','wordpress','aws'],mt_rand(1,6)),
        'gender' => $faker->randomElement(['male','female','other'])
],
        'remember_token' => Str::random(10),
    ];
});
