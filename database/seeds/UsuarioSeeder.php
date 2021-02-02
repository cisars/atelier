<?php

use App\Models\Usuario;
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
            'clave'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_ADMIN,
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        // Documentador //
        DB::table('usuarios')->insert([
            'usuario'  => 'doc',
            'clave'  => bcrypt('doc'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_DOCUMENTACION,
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        // ADMIN ROOT //
        DB::table('usuarios')->insert([
            'usuario'  => 'root',
            'clave'  => bcrypt('root'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_ADMIN,
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // EMPLEADO //
        DB::table('usuarios')->insert([
            'usuario'  => 'empleado',
            'empleado_id' => factory('App\Models\Empleado')->create([
                'nombres' => 'Funcionario',
                'apellidos' => 'Mensualero',
                'ci' => 3900400,
                'estado_civil' => 's',
                'sexo' => 'm',
                'direccion' => 'Random',
                'localidad_id' => App\Models\Localidad::inRandomOrder()->first()->id,
                'cargo_id' => App\Models\Cargo::inRandomOrder()->first()->id,
                'movil' => '(+595981)800700',
                'telefono' => '(+59521)200400' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'estado'  => '1',
                'salario' => '50000000'
            ])->id,
            'clave'  => bcrypt('empleado'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_FUNCIONARIO,
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);


        // ISAIAS //
        DB::table('usuarios')->insert([
            'usuario'  => 'isaias',
            'empleado_id' => factory('App\Models\Empleado')->create([
                'nombres' => 'Isaias',
                'apellidos' => 'Silva',
                'ci' => 3900400,
                'estado_civil' => 's',
                'sexo' => 'm',
                'direccion' => 'Radio Op. Ch.',
                'localidad_id' => App\Models\Localidad::inRandomOrder()->first()->id,
                'cargo_id' => App\Models\Cargo::inRandomOrder()->first()->id,
                'movil' => '(+595981)800700',
                'telefono' => '(+59521)200400' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'estado'  => '1',
                'salario' => '50000000'
            ])->id,
            'clave'  => bcrypt('isaias'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_ADMIN,
            'email'         => 'isaias85@gmail.com',
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // Yami //
        DB::table('usuarios')->insert([
            'usuario'  => 'yami',
            'empleado_id' => factory('App\Models\Empleado')->create([
                'nombres' => 'Yami',
                'apellidos' => 'Cabrera',
                'ci' => 3900400,
                'estado_civil' => 's',
                'sexo' => 'm',
                'direccion' => 'RandomAdress.',
                'localidad_id' => App\Models\Localidad::inRandomOrder()->first()->id,
                'cargo_id' => App\Models\Cargo::inRandomOrder()->first()->id,
                'movil' => '(+595981)800700',
                'telefono' => '(+59521)200400' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'estado'  => '1',
                'salario' => '50000000'
            ])->id,
            'clave'  => bcrypt('yami'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_ADMIN,
            'email'         => 'yamily_cabrera@hotmail.com',
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // BOOTSTRAP //
        DB::table('usuarios')->insert([
            'usuario'  => 'bootstrap',
            'empleado_id' => factory('App\Models\Empleado')->create([
                'nombres' => 'Bootstrap',
                'apellidos' => 'Examples',
                'ci' => 1000000,
                'estado_civil' => 's',
                'sexo' => 'm',
                'direccion' => 'None.',
                'localidad_id' => App\Models\Localidad::inRandomOrder()->first()->id,
                'cargo_id' => App\Models\Cargo::inRandomOrder()->first()->id,
                'movil' => '(+000)100100',
                'telefono' => '(+00000)200200' ,
                'fecha_nacimiento' => '1980-10-10',
                'fecha_ingreso' =>  date("Y-m-d H:m:s"),
                'estado'  => '1',
                'salario' => '00000000'
            ])->id,
            'clave'  => bcrypt('bootstrap'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_BOOTSTRAP,
            'tipo'          => Usuario::USUARIO_T_EMPLEADO,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        // CLIENTE //
        DB::table('usuarios')->insert([
            'usuario'  => 'cliente',
            'cliente_id' => factory('App\Models\Cliente')->create([
                'razon_social' => 'Juan Perez',
                'documento' => 4300200,
                'direccion' => 'E. Ayala 123',
                'localidad_id' => App\Models\Localidad::inRandomOrder()->first()->id,
                'movil' => '(+595981)100200',
                'telefono' => '(+59521)300400' ,
                'fecha_nacimiento' => '1981-11-11',
                'personeria' => 1,
            ])->id,
            'clave'  => bcrypt('cliente'),
            'fecha_ingreso' => now(),
            'estado'        => Usuario::USUARIO_ACTIVO,
            'observacion'   => '',
            'perfil'        => Usuario::USUARIO_CLIENTE,
            'email'          => 'juanperez@gmail.com',
            'tipo'          => Usuario::USUARIO_T_CLIENTE,
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);


    }
}


/*
 *

 */
