<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Maquinaria;
use Faker\Generator as Faker;

$factory->define(Maquinaria::class, function (Faker $faker) {
    (\App\Models\MaquinariaTipo::all() !== false ) ?  factory('App\Models\MaquinariaTipo')->create() : "";

    return [
        'maquinaria_tipo' => \App\Models\MaquinariaTipo::inRandomOrder()->first()->maquinaria_tipo,
        'descripcion'   => substr($faker->streetName, 0,79) ,
        'estado'        => Maquinaria::MAQUINARIA_INACTIVA ,
    ];
});
