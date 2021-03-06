<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Grupo;
use Faker\Generator as Faker;

$factory->define(Grupo::class, function (Faker $faker) {
    return [
        'descripcion' => substr( '(GT) '.$faker->userName, 0,39)
    ];
});
