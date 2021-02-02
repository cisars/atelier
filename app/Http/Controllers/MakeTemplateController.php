<?php

namespace App\Http\Controllers;

use App\Models\Recepcion;
use App\Models\Sintoma;
use App\Models\Usuario;
use Blade;
use DB;
use Illuminate\Http\Request;
use Schema;
use stdClass;

class MakeTemplateController extends Controller
{
    public function setValores(
       string  $nombre,
       string  $dbtipo,
       string  $longitud = NULL,
       string  $atributo = NULL,
       string  $predeterminado = NULL,
       string  $extra = NULL,
       string  $unico = NULL,
       string  $nombreclave = NULL
    )
    {
//        $this->setValores('empleado','integer','2','primario','','AUTO_INCREMENT')
//
//        $todo =
//            [
//                'dbtipo'        => 'integer',
//                'longitud'      => '10',
//                'nombre'        => 'empleado',
//                'atributo'      => 'unsigned',
//                'predeterminado'=> 'null',
//                'extra'         => 'AUTO_INCREMENT',
//                'unico'         => 'si',
//                'nombreclave'   => 'PRIMARY',
//            ];
    }
//$table->foreign('cargo_id')
//->references('id')
//->on('cargos')
//->onDelete('CASCADE')
//->onUpdate('CASCADE')
    public function foreign(
        $foreign            = null,
        $referencesID       = null,
        $onTable            = null,
        $onDelete           = null,
        $onUpdate           = null,

        $funcion            = null,
        $eloquent           = null,
        $related            = null,
        $foreignkey         = null,
        $localownerkey      = null,
        $relation           = null

    )
    {
        return [
            'foreign'       => $foreign,
            'referencesID'  => $referencesID,
            'onTable'       => $onTable,
            'onDelete'      => $onDelete,
            'onUpdate'      => $onUpdate,

            'funcion'       => $funcion,
            'eloquent'      => $eloquent,
            'related'       => $related,
            'foreignkey'    => $foreignkey,
            'localownerkey' => $localownerkey,
            'relation'      => $relation

        ];
    }

    public function constantes(
        $nombre             = null,
        $clave              = null,
        $valor              = null,
        $nombres            = null,
        $descripcion        = null,
        $visibilidad        = null
    )
    {
        return [
            'nombre' => $nombre,
            'clave' => $clave,
            'valor' =>  $valor,
            'nombres' =>  $nombres,
            'descripcion' =>  $descripcion,
            'visibilidad' =>  $visibilidad
        ];
    }
    public function parametros(
        $nombre         = null,
        $visibilidad    = null,
        $tipo           = null,
        $longitud       = null,
        $nulo           = null,
        $cardinalidad   = null,
        $predeterminado = null,
        $FK          = null,
        $fks         = null,
        $fk          = null,
        $orderby     = null,
        $selectdesc     = 'descripcion'

    )
    {
        /*
        $table->foreign('localidad_id')
            ->references('id')
            ->on('localidades');
        ->onDelete('CASCADE')
        ->onUpdate('CASCADE')
        */
        return [
            'nombre'            => $nombre,
            'visibilidad'       => $visibilidad,
            'tipo'              => $tipo,
            'longitud'          => $longitud,
            'nulo'              => $nulo,
            'cardinalidad'      => $cardinalidad,
            'predeterminado'    => $predeterminado,
            'FK'                => $FK,
            'fks'               => $fks,
            'fk'                => $fk,
            'orderby'           => $orderby,
            'selectdesc'           => $selectdesc

        ];
    }
    public function index()
    {
//                                                                    // talleres usuarios
//                                                            //        $usuarios = Usuario::all();
//                                                            //        $usuarios = Usuario::with(['usuario' => 'isaias']);
//                                                            //        $isaias = Usuario::find('isaias');
//                                                            //
//                                                            //
//                                                            //        dd($usuarios);
//                                                            //        dd($isaias->talleres());
//
//                                                                    $isaias = Usuario::find('isaias');
//                                                                    dd($isaias->talleres);
//
//
//
//                                                                    //recepciones sintomas
//                                                                    $recepcion = Recepcion::find(2);
//                                                                    dd($recepcion->sintomas);

        $gen = new stdClass();
        $tabla      = [
            'nombre' => 'feriados' ,
            'pk1' =>
                [
                    'nombre'        => 'feriado',
                    'tipo'          => 'integer',
                    'longitud'      => '',
                    'autoincrement' => 'si',
                ],
            'fk1' =>
                [
                    'nombre'        => 'calendario',
                    'tipo'          => 'integer',
                    'longitud'      => '',
                    'autoincrement' => 'si',
                ],
        ];
        // ################################################VARs#################################################
                /*
                ZZNOMBREZZ
        ZZnombresZZ
        ZZnombreZZ

        ZZFK1ZZ     -       ZZfks1ZZ        -       ZZfk1ZZ
        ZZFK2ZZ     -       ZZfks2ZZ        -       ZZfk2ZZ
        ZZFK3ZZ     -       ZZfks3ZZ        -       ZZfk3ZZ
        ZZFK4ZZ     -       ZZfks4ZZ        -       ZZfk4ZZ
        ZZFK5ZZ     -       ZZfks5ZZ        -       ZZfk5ZZ
        ZZFK6ZZ     -       ZZfks6ZZ        -       ZZfk6ZZ

        ZZESTADO1ZZ     -   ZZestado1ZZ    -    ZZestados1ZZ    -   <<getEstados1>>    -    <<estados1>>
            ZZESTADO2ZZ     -   ZZestado2ZZ    -    ZZestados2ZZ    -   <<getEstados2>>    -    <<estados2>>
            ZZESTADO3ZZ     -   ZZestado3ZZ    -    ZZestados3ZZ    -   <<getEstados3>>    -    <<estados3>>
        */
        // ################################################VARs#################################################
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Empleados' ,
                'ZNOMBREZ'    => 'Empleado' ,
                'ZnombresZ'   => 'empleados' ,
                'ZnombreZ'    => 'empleado' ,
                'columnas'  =>
                    [
                        $this->parametros('id',               'hidden',               'int',      '10' ,  'notnull', 'pk', 'autoincrement','','','',''),
                         ],
                'constantes'  =>
                    [

                        $this->constantes('estado_civil',   'EMPLEADO_CASADO',        'c' , 'estados_civiles'),


                    ]
            ];
//dd($tabla);
//        //Estado
//        const EMPLEADO_ACTIVO = '1';
//        const EMPLEADO_INACTIVO = '2';
//        //Sexo
//        const EMPLEADO_MASCULINO = 'm';
//        const EMPLEADO_FEMENINO = 'f';
//        //Estado Civil
//        const EMPLEADO_CASADO = 'c';
//        const EMPLEADO_DIVORCIADO = 'd';
//        const EMPLEADO_VIUDO = 'v';
//        const EMPLEADO_SOLTERO = 's';
        $tabla2      =
            [
                'nombre'    => 'empleados' ,
                'columnas'  =>
                    [
                        'primarykeys'  =>
                            [
                                'pk1'       =>
                                    [
                                        'nombre'        => 'id',
                                        'posicion'      => 1,
                                        'tipo'          => 'int',
                                        'longitud'      => '10',
                                        'nulo'          => 'no',
                                        'predeterminado'=> 'autoincrement',
                                    ],
                            ],
                        'foreignkeys'  =>
                            [
                                'fk1'       => 'feriado',
                                'fk2'       => 'calendario',
                            ],
                        'pk1'       => 'feriado',
                        'fk1'       => 'calendario',
                    ],
            ];

        $primarykeys =
            [
                'pk1' => 'Kprimario',
                'pk2' => 'Ksecundario',
            ];

        $foreignkeys =
            [
                'fk1' => 'primer foraneo',
                'fk2' => 'segundo foraneo',
            ];

        $columnas =
            [
                'columna1' =>
                    [
                        'descripcion' =>    'c1 columna',
                        'tipo' =>           'numerico',
                    ],
                'columna2' =>
                    [
                        'descripcion' => 'c2columna',
                        'tipo' => 'text',
                    ],
            ];
        $thedat =
            [
                '001' => '002',

            ];

        $var = Blade::compileString('
<script type=\'text/javascript\'>
var variable = \'<?= $variable ?>\';
</script>');

        $gen->dat = '001';
        $gen->pk = $primarykeys;
        $gen->fk = $foreignkeys;
        $gen->cols = $columnas;
        $gen->var = $var;
        $gen->tabla = $tabla;

        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}




//$var = Blade::compileString('
//<script type=\'text/javascript\'>
/*var variable = \'<?= $variable ?>\';*/
//</script>');
//
//$var = Blade::compileString('
//<?php
//$a = array(\'a\' => 1, \'b\' => 2, 3 => \'c\');
//
//echo "$a[a] ${a[3] /* } comment */} {$a[b]} \ $a[a]";
//
//function hello($who) {
//	return "Hello $who!";
//}
//? >
