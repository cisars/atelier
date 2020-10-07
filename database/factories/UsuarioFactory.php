<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use App\Models\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'usuario' => $faker->userName,
        //'empleado' => factory(App\Models\Empleado::class),
        'cliente' => factory(App\Models\Cliente::class),
        'usuario_verified_at' => now(),
        'clave' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ];
});
//'user_id' => random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id')), esto es para aqui
//$factory->create(App\Models\Empleado::class)->empleado,
