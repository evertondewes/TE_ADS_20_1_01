<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define('App\Message', function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'text' => $faker->sentence(10),
    ];
});

