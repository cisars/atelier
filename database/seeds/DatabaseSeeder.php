<?php

use App\Models\Cliente;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Usuario;
use App\Models\Vehiculo;
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
        /*Parametros y descanso*/
        DB::table('talleres')->insert([
            'sucursal_id'   => factory('App\Models\Sucursal')->create([
                'descripcion'               => 'El Defensor',
                'direccion'                 => 'Eusebio Ayala',
                'localidad_id'              => factory('App\Models\Localidad')->create([
                                                'descripcion'           => 'Mburicao',
                                            ])->id,
                'telefono'                  => '+5958813811',
                'email'                     => 'defensor@atelier.com'
            ])->id,
            'descripcion'   => 'Atelier',
            'direccion'     => 'Eusebio Ayala 692 Esq. Kutbicheck',
            'telefono'      => '+5956846975',
        ]);
        factory('App\Models\Cliente', 5)->create();

        factory('App\Models\Cargo',4)->create();
        factory('App\Models\Localidad',4)->create();
        factory('App\Models\Sucursal', 4)->create();
        factory('App\Models\Taller', 2)->create();
     //   factory('App\Models\Turno')->create();

        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ClienteSeeder::class);



        // Colores //
        factory('App\Models\Color')->create([ 'descripcion'  => 'Rojo' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Tinto' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Blanco' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Marfil' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Azul' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Negro' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Plateado' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Gris' ]);

        // Marcas //
        factory('App\Models\Marca')->create([ 'descripcion'  => 'Hyundai' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'Toyota' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'KIA' ]);

        // Modelos //
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Tucson'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Santa Fe'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Picanto'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Sorento'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'LandCruiser Prado'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Tercel'
        ]);

        // Vehiculos //
        DB::table('vehiculos')->insert([
            'cliente_id' =>  Usuario::where('usuario', 'isilva')->first()->cliente_id ,
            'modelo_id'  => Modelo::where('descripcion', 'Tucson')->first()->id,
            'chapa'   => '777888',
            'chasis'   => 'cha6666',
            'color_id'   => Color::where('descripcion', 'Rojo')->first()->id,
            'combustion'   => Vehiculo::COMBUSTION_GASOIL,
            'tipo'   => Vehiculo::TIPO_SUV,
            'año'   => '2012',
        ]);
        DB::table('vehiculos')->insert([
            'cliente_id' =>  Usuario::where('usuario', 'isilva')->first()->cliente_id ,
            'modelo_id'  => Modelo::where('descripcion', 'Tercel')->first()->id,
            'chapa'   => '888999',
            'chasis'   => 'cha5555',
            'color_id'   => Color::where('descripcion', 'Plateado')->first()->id,
            'combustion'   => Vehiculo::COMBUSTION_GASOIL,
            'tipo'   => Vehiculo::TIPO_SEDAN,
            'año'   => '2012',
        ]);


        /*Parametros y descanso*/
        DB::table('descansos')->insert([
            'parametro_id' => factory('App\Models\Parametro')->create([
                'descripcion'               => 'De 7 a 13 con 10 sectores',
                'cantidad_prioridad_alta'   => '6',
                'jefe_mecanicos'            => '1',
                'periodicidad'              => '15',
                'hora_apertura'             => '07:30',
                'hora_cierre'               => '13:30',
                'hora_apertura_sab'         => '07:30',
                'hora_cierre_sab'           => '10:00',
                'activo'                    => true,
                'sectores'                  => '10',
            ])->id,
            'desde'         => '09:45',
            'hasta'         => '13:00',
        ]);

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



