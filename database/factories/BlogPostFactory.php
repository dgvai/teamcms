<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blogs\Blogs;
use App\Models\Team\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Blogs::class, function (Faker $faker) {
    $title = $faker->text(100);
    return [
        'slug' => Str::slug($title),
        'title' => $title,
        'banner' => 'faker-'.rand(1,7).'.jpg',
        'user_id' => User::where('status',1)->get()->random()->id,
        'post'  => $faker->paragraph(),
    ];
});
