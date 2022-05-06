<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\Models\Productos;

$factory->define(Productos::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text(255),
        'precio' => $faker->text(255),
        'imagen' => $faker->text(255),
        'observacion' => $faker->text,
    ];
});
