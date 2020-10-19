<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuario'  => 'cliente1',
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
            'clave'  => bcrypt('cliente1'),
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
