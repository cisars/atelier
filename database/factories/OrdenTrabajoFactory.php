<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrdenTrabajo;
use Faker\Generator as Faker;

$factory->define(OrdenTrabajo::class, function (Faker $faker) {
// Get all data fk tables
    (\App\Models\Taller::all()->count() > 0 ) ? "" : factory('App\Models\Taller')->create()  ;
    (\App\Models\Recepcion::all()->count() > 0 ) ? "" : factory('App\Models\Recepcion')->create() ;
    (\App\Models\Cliente::all()->count() > 0 ) ? "" : factory('App\Models\Cliente')->create()  ;
    (\App\Models\Vehiculo::all()->count() > 0 ) ? "" : factory('App\Models\Vehiculo')->create()  ;
    (\App\Models\Empleado::all()->count() > 0 ) ? "" : factory('App\Models\Empleado')->create()  ;
    (\App\Models\Grupo::all()->count() > 0 ) ? "" : factory('App\Models\Grupo')->create()  ;
    (\App\Models\Usuario::all()->count() > 0 ) ? "" : factory('App\Models\Usuario')->create()  ;

return [
//id
    'taller_id'  => \App\Models\Taller::inRandomOrder()->first()->id,
    'fecha_recepcion' => $faker->dateTimeBetween('-50 years', '-20 years' ),
    'fecha_fin' => $faker->dateTimeBetween('-50 years', '-20 years' ),
    'recepcion_id'  => \App\Models\Recepcion::inRandomOrder()->first()->id,
    'cliente_id'  => \App\Models\Cliente::inRandomOrder()->first()->id,
    'vehiculo_id'  => \App\Models\Vehiculo::inRandomOrder()->first()->id,
    'empleado_id'  => \App\Models\Empleado::inRandomOrder()->first()->id,
    'grupo_id'  => \App\Models\Grupo::inRandomOrder()->first()->id,
    'tipo' => $faker->randomElement(['0']),
    'prioridad' => $faker->randomElement(['n','n']),
    'estado' => $faker->randomElement(['p','c','a']),
    'descripcion' => $faker->text(200),
    'importe_total' => $faker->numberBetween(100000000000 ,999999999999 ),
    'usuario'  => \App\Models\Usuario::inRandomOrder()->first()->id,
    ];
});
