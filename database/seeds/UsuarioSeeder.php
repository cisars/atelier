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
            'empleado'  => App\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('admin'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1'
        ]);
        DB::table('usuarios')->insert([
            'usuario'  => 'empleado',
            'empleado'  => App\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('empleado'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1'
        ]);
        DB::table('usuarios')->insert([
            'usuario'  => 'isaias',
            'empleado'  => App\Empleado::inRandomOrder()->first()->empleado,
            'clave'  => bcrypt('isaias'),
            //$this->attributes['password'] = bcrypt($value);
            //'clave_verificacion'  => bcrypt('admin'),
            'fecha_ingreso' => now(),
            'estado'        => 'A',
            'observacion'   => '',
            'perfil'        => '1',
            'tipo'          => '1'
        ]);
    }
}
