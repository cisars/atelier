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
        // Grupos //
        factory('App\Models\Grupo')->create([ 'descripcion'  => 'Naranjal' ]);
        factory('App\Models\Grupo')->create([ 'descripcion'  => 'Mbocaya' ]);
        factory('App\Models\Grupo')->create([ 'descripcion'  => 'Arasunu' ]);
        factory('App\Models\Grupo')->create([ 'descripcion'  => 'Yvate' ]);
        factory('App\Models\Grupo')->create([ 'descripcion'  => 'Cerroi' ]);

        // Cargos //
        factory('App\Models\Cargo')->create([ 'descripcion'  => 'Recepcionista' ]);
        factory('App\Models\Cargo')->create([ 'descripcion'  => 'Administrador' ]);
        factory('App\Models\Cargo')->create([ 'descripcion'  => 'Mecanico' ]);
        factory('App\Models\Cargo')->create([ 'descripcion'  => 'Jefe de Mecanicos' ]);
        factory('App\Models\Cargo')->create([ 'descripcion'  => 'Operador' ]);

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
        factory('App\Models\Cliente', 50)->create();

        //   factory('App\Models\Cargo',4)->create();
        factory('App\Models\Localidad',4)->create();
        factory('App\Models\Sucursal', 4)->create();
        factory('App\Models\Taller', 2)->create();
        //    factory('App\Models\Sintoma', 10)->create();
        //   factory('App\Models\Turno')->create();

        //Tipos de maquinaria
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Herramientas de mano' ]);
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Herramientas neumáticas o hidráulicas' ]);
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Elevadores' ]);
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Herramientas de corte' ]);
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Herramientas para sujetar piezas' ]);
        factory('App\Models\MaquinariaTipo')->create([ 'descripcion'  => 'Herramientas de medición y diagnóstico' ]);

        //Maquinaria
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Llaves' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Destornilladores' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Sierras' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Martillos' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Alicate' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de mano')->first()->id, 'descripcion'  => 'Martillo de bola' ]);


        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Flexómetro' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Micrómetro' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Goniómetro' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Regla graduada' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Calibre o pie de rey' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Escuadra' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Manómetro' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Analizadores de gases' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas de medición y diagnóstico')->first()->id, 'descripcion'  => 'Cuentarrevoluciones' ]);

        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Gato de tijera' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Gato de carretilla' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Gato de botella' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Elevador de 2 columnas' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Elevador de 4 columnas' ]);
        DB::table('maquinarias')->insert([ 'maquinaria_tipo_id' =>  \App\Models\MaquinariaTipo::where('descripcion', 'Herramientas neumáticas o hidráulicas')->first()->id, 'descripcion'  => 'Elevador de tijera' ]);


        $this->call(EmpleadoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ClienteSeeder::class);

        // Sintomas //
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Parpadea el tablero de control' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Parpadean las luces delanteras' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Parpadean las luces traseras' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No arranca' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Arranca y para' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos al andar' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos en el capo delantero' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos en la parte trasera' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos en la parte delantera' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos al acelerar' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos al frenar' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos al encender el limpia parabrisas' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'Ruidos al encender las luces de stop' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No enciende el motor' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No encienden las luces delanteras' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No encienden las luces traseras' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No encienden las luces' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No enciende el aire acondicionado' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No enciende la radio' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona los levanta vidrios' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el tablero del volante' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el tablero de la puerta' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el cierre automático' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona la luz de frenado' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el freno' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el embrague' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona cambiar de velocidad' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el limpia parabrisas delantero' ]);
        factory('App\Models\Sintoma')->create([ 'descripcion'  => 'No funciona el limpia parabrisas trasero' ]);

        // Colores //
        factory('App\Models\Color')->create([ 'descripcion'  => 'Blanco' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Blanco perla' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Amarillo' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Dorado' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Amarillo sol' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Naranja' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Rojo intenso' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Rojo' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Tinto' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Marfil' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Beige' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Azul Oscuro' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Azul Claro' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Azul' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Negro' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Plateado' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Gris' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Marrón profundo' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Violeta' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Verde Oscuro' ]);
        factory('App\Models\Color')->create([ 'descripcion'  => 'Bitono' ]);



        // Sectores //
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'AI'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'AII'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'AIII'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'AIV'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'AV'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'BI'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'BII'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'BIII'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'BIV'
        ]);
        DB::table('sectores')->insert([
            'taller_id' =>  \App\Models\Taller::where('descripcion', 'Atelier')->first()->id,
            'descripcion'  => 'BV'
        ]);

        // Marcas //
        factory('App\Models\Marca')->create([ 'descripcion'  => 'Hyundai' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'Toyota' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'KIA' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'CHEVROLET' ]);
        factory('App\Models\Marca')->create([ 'descripcion'  => 'JEEP' ]);

        // Clasificacion //
        factory('App\Models\Clasificacion')->create([ 'descripcion'  => 'Servicio' ]);
        factory('App\Models\Clasificacion')->create([ 'descripcion'  => 'Repuesto' ]);
        factory('App\Models\Clasificacion')->create([ 'descripcion'  => 'Producto' ]);

        // Unidad //
        factory('App\Models\Unidad')->create([ 'descripcion'  => 'Litros', 'sigla'  => 'lt', ]);
        factory('App\Models\Unidad')->create([ 'descripcion'  => 'Unidades', 'sigla'  => 'uni', ]);
        factory('App\Models\Unidad')->create([ 'descripcion'  => 'Pack12', 'sigla'  => 'p12', ]);
        factory('App\Models\Unidad')->create([ 'descripcion'  => 'Pack6', 'sigla'  => 'p6', ]);


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
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'I20'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Ix35'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Veloster'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Elantra'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'IONIQ'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'Hyundai')->first()->id,
            'descripcion'  => 'Kona'
        ]);

        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Picanto'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Sorento'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Sportage'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Venga'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Optima'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Soul'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Stinger'
        ]);
        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'KIA')->first()->id,
            'descripcion'  => 'Rio'
        ]);

        DB::table(
            'modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'LandCruiser Prado'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Tercel'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Yaris'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Prius'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Hilux'
        ]);
        DB::table('modelos')->insert([
            'marca_id' =>  Marca::where('descripcion', 'TOYOTA')->first()->id,
            'descripcion'  => 'Avensis'
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
            'cliente_id' =>  Usuario::where('usuario', 'cliente')->first()->cliente_id ,
            'modelo_id'  => Modelo::where('descripcion', 'Tercel')->first()->id,
            'chapa'   => '888999',
            'chasis'   => 'cha5555',
            'color_id'   => Color::where('descripcion', 'Plateado')->first()->id,
            'combustion'   => Vehiculo::COMBUSTION_GASOIL,
            'tipo'   => Vehiculo::TIPO_SEDAN,
            'año'   => '2012',
        ]);
        DB::table('vehiculos')->insert([
            'cliente_id' =>  Usuario::where('usuario', 'cliente')->first()->cliente_id ,
            'modelo_id'  => Modelo::where('descripcion', 'Tucson')->first()->id,
            'chapa'   => '778948',
            'chasis'   => 'cha1234',
            'color_id'   => Color::where('descripcion', 'Negro')->first()->id,
            'combustion'   => Vehiculo::COMBUSTION_HIDROGENO,
            'tipo'   => Vehiculo::TIPO_SUV,
            'año'   => '2022',
        ]);
        DB::table('vehiculos')->insert([
            'cliente_id' =>  Usuario::where('usuario', 'cliente')->first()->cliente_id ,
            'modelo_id'  => Modelo::where('descripcion', 'Picanto')->first()->id,
            'chapa'   => '648523',
            'chasis'   => 'cha5151',
            'color_id'   => Color::where('descripcion', 'Plateado')->first()->id,
            'combustion'   => Vehiculo::COMBUSTION_GASOIL,
            'tipo'   => Vehiculo::TIPO_SUBCOMPACTO,
            'año'   => '2015',
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

        /*
         * Productos
         */
        DB::table('productos_servicios')->insert([
            'codigo' =>  'P01',
            'descripcion'  => 'RJK BATERIAS',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Producto')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 560000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);
        DB::table('productos_servicios')->insert([
            'codigo' =>  'P02',
            'descripcion'  => 'Aceite Castrol Edge 5w30',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Producto')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'lt')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 65000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        /* Servicios */
        DB::table('productos_servicios')->insert([
            'codigo' =>  'S01',
            'descripcion'  => 'Mantenimiento programado',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 450000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        DB::table('productos_servicios')->insert([
            'codigo' =>  'S02',
            'descripcion'  => 'Limpieza profunda de tapizado',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 135000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        DB::table('productos_servicios')->insert([
            'codigo' =>  'S03',
            'descripcion'  => 'Cambio de Aceite',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 135000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        DB::table('productos_servicios')->insert([
            'codigo' =>  'S04',
            'descripcion'  => 'Pegado de cinchos y pastillas de freno',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 135000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        DB::table('productos_servicios')->insert([
            'codigo' =>  'S05',
            'descripcion'  => 'Chapería y pintura',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 600000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);
        DB::table('productos_servicios')->insert([
            'codigo' =>  'S06',
            'descripcion'  => 'Calibración y ajustes',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Servicio')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 150000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);

        /* Repuestos */
        DB::table('productos_servicios')->insert([
            'codigo' =>  'R01',
            'descripcion'  => 'Buje Kit Embrague G20',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Repuesto')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 75000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
        ]);
        DB::table('productos_servicios')->insert([
            'codigo' =>  'R02',
            'descripcion'  => 'Alternador KIA TW',
            'clasificacion_id'   => \App\Models\Clasificacion::where('descripcion', 'Repuesto')->first()->id,
            'unidad_id'   => \App\Models\Unidad::where('sigla', 'uni')->first()->id,
            'impuesto'   => 10,
            'precio_venta'   => 360000,
            'estado'   => \App\Models\ProductoServicio::ESTADO_ACTIVO,
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



