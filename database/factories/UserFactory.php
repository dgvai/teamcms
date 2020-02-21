<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$KmelMBjKGlQw0DDavFUAy.J87BssIgGwpQXYHc1ceMiuHiNC36DJi', // 123456
        'roll_id' => $faker->randomNumber(7),
        'designation' => 0,
        'class' => 0,
        'status' => 1
    ];
});
