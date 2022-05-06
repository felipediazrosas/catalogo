<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Models\Ciudades;

$factory->define(Ciudades::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text(255),
        'lat' => $faker->text(255),
        'lng' => $faker->text(255),
    ];
});
