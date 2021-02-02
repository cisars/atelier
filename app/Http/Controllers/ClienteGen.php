<?php

namespace App\Http\Controllers;

use Blade;
use Illuminate\Http\Request;
use stdClass;

class ClienteGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Clientes' ,
                'ZNOMBREZ'    => 'Cliente' ,
                'ZnombresZ'   => 'clientes' ,
                'ZnombreZ'    => 'cliente' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'smallint', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('razon_social',     'Razon Social',         'varchar',  '40',   'notnull','','','','','','',''),
                        $genisa->parametros('documento',        'Documento',            'varchar',  '12',   'notnull','','','','','','',''),
                        $genisa->parametros('direccion',        'Direccion',            'varchar',  '80',   'notnull','','','','','','',''),
                        $genisa->parametros('localidad_id',     'Localidad',            'smallint',  '',   'notnull','fk','',
                            'Localidad','localidades','localidad','descripcion',''),
                        $genisa->parametros('telefono',        'Telefono',              'varchar',  '20',   'notnull','','','','','','',''),
                        $genisa->parametros('Movil',           'Movil',                 'varchar',  '20',   'notnull','','','','','','',''),
                        $genisa->parametros('fecha_nacimiento', 'Fecha de Nacimiento',  'date',     '20',   'null','','','','','','',''),
                        $genisa->parametros('personeria',       'Tipo de Personeria',   'char',     '1',   'notnull','cons','','','personerias','','',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('localidad_id','id','localidades','CASCADE','CASCADE',
                            'localidad', 'belongsTo', 'Localidad::class', 'empleado_id','', ''),
                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
                            'usuario', 'hasMany', 'Empleado::class', 'usuario','', ''),
                        $genisa->foreign('vehiculo_id','id','vehiculos','CASCADE','CASCADE',
                            'vehiculos', 'hasMany', 'Cliente::class', 'vehiculo_id','', ''),
                        $genisa->foreign('reserva_id','id','reservas','CASCADE','CASCADE',
                            'reservas', 'hasMany', 'Cliente::class', 'reserva_id','', ''),
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

                        $genisa->constantes('personeria',     'PERSONERIA_SOCIEDADES',    	's' , 'personerias',    'Personeria', 	'Sociedades'),
                        $genisa->constantes('personeria',     'PERSONERIA_CIVILES',    		'c' , 'personerias',    'Personeria', 		'Civiles'	),
                        $genisa->constantes('personeria',     'PERSONERIA_SIMPLES ',    	'i' , 'personerias',    'Personeria ', 	'Simples '	),
                        $genisa->constantes('personeria',     'PERSONERIA_FUNDACIONES',    	'f' , 'personerias',    'Personeria', 	'Fundaciones'),
                        $genisa->constantes('personeria',     'PERSONERIA_ENTIDADES',    	'e' , 'personerias',    'Personeria', 	'Entidades'	),
                        $genisa->constantes('personeria',     'PERSONERIA_MUTUALES',    	'm' , 'personerias',    'Personeria', 	'Mutuales'	),
                        $genisa->constantes('personeria',     'PERSONERIA_COOPERATIVAS',    'o' , 'personerias',    'Personeria', 'Cooperativas'),
                        $genisa->constantes('personeria',     'PERSONERIA_CONSORCIOS',    	'n' , 'personerias',    'Personeria', 	'Consorcios'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}

