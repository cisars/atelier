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

        DB::table('usuarios')->insert([
            'usuario'  => 'admin',
            'empleado'  => App\Models\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('admin'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        DB::table('usuarios')->insert([
            'usuario'  => 'empleado',
            'empleado'  => App\Models\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('empleado'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
        DB::table('usuarios')->insert([
            'usuario'  => 'isaias',
            'empleado'  => App\Models\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('isaias'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1',
            'usuario_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);
    }
}
