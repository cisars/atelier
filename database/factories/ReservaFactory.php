<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reserva;
use Faker\Generator as Faker;

$factory->define(Reserva::class, function (Faker $faker) {
    (\App\Models\Taller::all()->count() > 0 )      ? "" : factory('App\Models\Taller')->create() ;
    (\App\Models\Cliente::all()->count() > 0 )     ? "" : factory('App\Models\Cliente')->create() ;
    (\App\Models\Vehiculo::all()->count() > 0 )    ? "" : factory('App\Models\Vehiculo')->create() ;
    (\App\Models\Empleado::all()->count() > 0 )    ? "" : factory('App\Models\Empleado')->create() ;
    (\App\Models\Usuario::all()->count() > 0 )     ? "" : factory('App\Models\Usuario')->create() ;

    return [
        'taller_id'  => \App\Models\Taller::where('descripcion','Atelier')->first()->id,
        'cliente_id'  => \App\Models\Cliente::inRandomOrder()->first()->id,
        'vehiculo_id'  => \App\Models\Vehiculo::inRandomOrder()->first()->id,
        'fecha' => $faker->dateTimeBetween('-1 days', '+1 days' ),
        'para_fecha' => $faker->dateTimeBetween('+1 days', '+15 days' ),
        'empleado_id'  => \App\Models\Empleado::inRandomOrder()->first()->id,
        'estado' => (new Reserva)->getEstados()[array_rand( (new Reserva)->getEstados())],
        'forma_reserva' => (new Reserva)->getFormas()[array_rand( (new Reserva)->getFormas())],
        'prioridad' => (new Reserva)->getPrioridades()[array_rand( (new Reserva)->getPrioridades())],
        'observacion' => substr($faker->paragraph, 0,199) ,
        'usuario'  => \App\Models\Usuario::inRandomOrder()->first()->usuario,
    ];
});
