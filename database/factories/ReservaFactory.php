<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reserva;
use Faker\Generator as Faker;

$factory->define(Reserva::class, function (Faker $faker) {
    (\App\Models\Taller::all() !== false )      ?  factory('App\Models\Taller')->create() : "";
    (\App\Models\Cliente::all() !== false )     ?  factory('App\Models\Cliente')->create() : "";
    (\App\Models\Vehiculo::all() !== false )    ?  factory('App\Models\Vehiculo')->create() : "";
    (\App\Models\Empleado::all() !== false )    ?  factory('App\Models\Empleado')->create() : "";
    (\App\Models\Usuario::all() !== false )     ?  factory('App\Models\Usuario')->create() : "";

    return [
        'taller'  => \App\Models\Taller::inRandomOrder()->first()->taller,
        'cliente'  => \App\Models\Cliente::inRandomOrder()->first()->cliente,
        'vehiculo'  => \App\Models\Vehiculo::inRandomOrder()->first()->vehiculo,
        'fecha' => $faker->dateTimeBetween('-30 days', '+10 days' ),
        'para_fecha' => $faker->dateTimeBetween('+11 days', '+30 days' ),
        'empleado'  => \App\Models\Empleado::inRandomOrder()->first()->empleado,
        'estado' => (new Reserva)->getEstados()[array_rand( (new Reserva)->getEstados())],
        'forma_reserva' => (new Reserva)->getFormas()[array_rand( (new Reserva)->getFormas())],
        'prioridad' => (new Reserva)->getPrioridades()[array_rand( (new Reserva)->getPrioridades())],
        'observacion' => substr($faker->paragraph, 0,199) ,
        'usuario'  => \App\Models\Usuario::inRandomOrder()->first()->usuario,
    ];
});
