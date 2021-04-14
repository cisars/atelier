<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ReservaGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Reservas' ,
                'ZNOMBREZ'    => 'Reserva' ,
                'ZnombresZ'   => 'reservas' ,
                'ZnombreZ'    => 'reserva' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int',      '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('taller_id',       'Taller',                'smallint',  '',   'notnull','fk','',
                            'Taller','talleres','taller','descripcion',''),
                        $genisa->parametros('cliente_id',       'Cliente',              'smallint',  '',   'notnull','fk','',
                            'Cliente','clientes','cliente','razon_social',''),
                        $genisa->parametros('vehiculo_id',     'Vehículo',              'smallint',  '',   'notnull','fk','',
                            'Vehiculo','vehiculos','vehiculo','id',''),

                        $genisa->parametros('fecha',            'Fecha',                'date',     '',   'notnull','','','','','','',''),
                        $genisa->parametros('para_fecha',        'Para Fecha',          'date',     '',   'notnull','','','','','','',''),
                        $genisa->parametros('empleado_id',     'Empleado',              'smallint',  '',   'notnull','fk','',
                            'Empleado','empleados','empleado','apellidos',''),

                        $genisa->parametros('estado',           'Estado',           'char',     '1',   'notnull','cons','','','estados','','',''),
                        $genisa->parametros('forma_reserva',    'Forma Reserva',    'char',     '1',   'notnull','cons','','','formas_reservas','','',''),
                        $genisa->parametros('prioridad',        'Prioridad',        'char',     '1',   'notnull','cons','','','prioridades','','',''),

                        $genisa->parametros('observacion',        'Observación',        'varchar',  '200',   'notnull','','','','','','',''),
                        $genisa->parametros('usuario',            'Usuario',            'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),
                        $genisa->parametros('para_hora',        'Para Hora',              'time',  '',   'notnull','','','','','','',''),
                        $genisa->parametros('sector',           'Sector',                 'tinyint',  '',   'notnull','','','','','','',''),
                        $genisa->parametros('ticket',           'Ticket',                 'tinyint',  '',   'notnull','','','','','','',''),
                        $genisa->parametros('parametro_id',     'Parametro ID',            'tinyint',  '',   'notnull','fk','',
                            'Parametro','parametros','parametro','descripcion',''),

                    ],
                'relaciones'  =>
                    [
//                        $genisa->foreign('localidad_id','id','localidades','CASCADE','CASCADE',
//                            'localidad', 'belongsTo', 'Localidad::class', 'empleado_id','', ''),
//                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
//                            'usuario', 'hasMany', 'Empleado::class', 'usuario','', ''),
//                        $genisa->foreign('vehiculo_id','id','vehiculos','CASCADE','CASCADE',
//                            'vehiculos', 'hasMany', 'Cliente::class', 'vehiculo_id','', ''),
//                        $genisa->foreign('reserva_id','id','reservas','CASCADE','CASCADE',
//                            'reservas', 'hasMany', 'Cliente::class', 'reserva_id','', ''),
//                        $genisa->foreign('ot_id','id','ordenes_trabajos','CASCADE','CASCADE',
//                            'ots', 'hasMany', 'Cliente::class', 'ot_id','', ''),
//                        $genisa->foreign('entrega_id','id','entregas','CASCADE','CASCADE',
//                            'entregas', 'hasMany', 'Cliente::class', 'entrega_id','', ''),
//                        $genisa->foreign('factura_id','id','facturas','CASCADE','CASCADE',
//                            'facturas', 'hasMany', 'Cliente::class', 'factura_id','', ''),

                        // usuarios
                        //  vehiculos
                        // reservas
                        //  ordendes_trabajo
                        //  entregas
                        //   facturas
                        //   recepciones

                    ],
                'constantes'  =>
                    [

//                        $genisa->constantes('personeria',     'PERSONERIA_SOCIEDADES',    	's' , 'personerias',    'Personeria', 	'Sociedades'),
//                        $genisa->constantes('personeria',     'PERSONERIA_CIVILES',    		'c' , 'personerias',    'Personeria', 		'Civiles'	),
//                        $genisa->constantes('personeria',     'PERSONERIA_SIMPLES ',    	'i' , 'personerias',    'Personeria ', 	'Simples '	),
//                        $genisa->constantes('personeria',     'PERSONERIA_FUNDACIONES',    	'f' , 'personerias',    'Personeria', 	'Fundaciones'),
//                        $genisa->constantes('personeria',     'PERSONERIA_ENTIDADES',    	'e' , 'personerias',    'Personeria', 	'Entidades'	),
//                        $genisa->constantes('personeria',     'PERSONERIA_MUTUALES',    	'm' , 'personerias',    'Personeria', 	'Mutuales'	),
//                        $genisa->constantes('personeria',     'PERSONERIA_COOPERATIVAS',    'o' , 'personerias',    'Personeria', 'Cooperativas'),
//                        $genisa->constantes('personeria',     'PERSONERIA_CONSORCIOS',    	'n' , 'personerias',    'Personeria', 	'Consorcios'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
