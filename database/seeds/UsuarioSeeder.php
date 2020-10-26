<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    //https://github.com/emifernandez/sgrc/blob/master/app/Http/Controllers/Barrio/BarrioController.php
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN //
        DB::table('usuarios')->insert([
            'usuario'  => 'admin',
            'empleado'  => App\Models\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // EMPLEADO //
        DB::table('usuarios')->insert([
            'usuario'  => 'empleado',
            'empleado'  => App\Models\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('empleado'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);


        // ISAIAS //
        DB::table('usuarios')->insert([
            'usuario'  => 'isaias',
            'empleado' => factory('App\Models\Empleado')->create([
                'nombres' => 'Isaias',
                'apellidos' => 'Silva',
                'ci' => 3900400,
                'estado_civil' => 'S',
                'sexo' => 'M',
                'direccion' => 'Radio Op. Ch.',
                'localidad' => App\Models\Localidad::inRandomOrder()->first()->localidad,
                'cargo' => App\Models\Cargo::inRandomOrder()->first()->cargo,
                'movil' => '(+595981)800700',
                'telefono' => '(+59521)200400' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'salario' => '50000000'
            ])->empleado,
            'clave'  => bcrypt('isaias'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // BOOTSTRAP //
        DB::table('usuarios')->insert([
            'usuario'  => 'bootstrap',
            'empleado' => factory('App\Models\Empleado')->create([
                'nombres' => 'Bootstrap',
                'apellidos' => 'Examples',
                'ci' => 1000000,
                'estado_civil' => 'S',
                'sexo' => 'M',
                'direccion' => 'None.',
                'localidad' => App\Models\Localidad::inRandomOrder()->first()->localidad,
                'cargo' => App\Models\Cargo::inRandomOrder()->first()->cargo,
                'movil' => '(+000)100100',
                'telefono' => '(+00000)200200' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'salario' => '00000000'
            ])->empleado,
            'clave'  => bcrypt('bootstrap'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => 'B',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // CLIENTE //
        DB::table('usuarios')->insert([
            'usuario'  => 'cliente',
            'cliente' => factory('App\Models\Cliente')->create([
                'razon_social' => 'Juan Perez',
                'documento' => 4300200,
                'direccion' => 'E. Ayala 123',
                'localidad' => App\Models\Localidad::inRandomOrder()->first()->localidad,
                'movil' => '(+595981)100200',
                'telefono' => '(+59521)300400' ,
                'fecha_nacimiento' => '1981-11-11',
                'personeria' => 1,
            ])->cliente,
            'clave'  => bcrypt('cliente'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '2',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);


    }
}


/*
 *

 */
