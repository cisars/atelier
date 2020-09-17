<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CalendarioAtencion;
use Faker\Generator as Faker;

$factory->define(CalendarioAtencion::class, function (Faker $faker) {
    return [
        'calendario_atencion' => $faker->unique()->numerify(),
        'turno_recepcion' => $faker->unique()->numerify(),
        'hora_desde' => $faker->time(),
        'hora_hasta' => $faker->time(),
        'prioridad' => \Illuminate\Support\Str::random(1),
        'estado' => \Illuminate\Support\Str::random(1),
        'cliente' => $faker->unique()->numerify(),
        'usuario' => factory(App\Usuario::class)

    ];
});

/*
 * 'usuario' => factory(App\Usuario::class)->create()->get('empleado')->last()
 */
