<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Cliente', 5)->create();

        factory('App\Models\Cargo')->create();
        factory('App\Models\Localidad')->create();
        factory('App\Models\Sucursal')->create();
     //   factory('App\Models\Turno')->create();

        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}

/**
 * Creacion de DER diagramas en app que combina con Laravel
 * https://www.dbdesigner.net/features/

$newEmpleado = factory('App\Models\Empleado')->create();
$newCliente = factory('App\Models\Cliente')->create();
$newCalendario = factory('App\Models\CalerndarioAtencion')->create();
$newUsuario = factory('App\Models\Usuario')->create();

$Usuarios = App\Models\Usuario::all()
$Clientes = App\Models\Cliente::all()
$Empleados = App\Models\Empleado::all()






App\Models\Usuario::where('empleado',5)->first();



*/



