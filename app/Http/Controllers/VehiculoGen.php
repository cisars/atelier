<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class VehiculoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Vehiculos' ,
                'ZNOMBREZ'    => 'Vehiculo' ,
                'ZnombresZ'   => 'vehiculos' ,
                'ZnombreZ'    => 'vehiculo' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',           'hidden',               'smallint',     '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('cliente_id',   'Cliente',              'smallint',     '',     'notnull', 'fk',
                            '', 'Cliente',      'clientes',     'cliente',  'razon_social',''),
                        $genisa->parametros('modelo_id',    'Modelo',               'tinyint',     '',     'notnull', 'fk',
                            '', 'Modelo',       'modelos',  'modelo',       'descripcion',''),
                        $genisa->parametros('chapa',        'Chapa',                'varchar',      '12' , 'notnull','unique','','','','',''),
                        $genisa->parametros('chasis',       'Chasis',               'varchar',      '12',   'null',  'unique','','','','',''),
                        $genisa->parametros('color_id',     'Colores',              'tinyint',     '',     'notnull', 'fk',
                            '', 'Color',        'colores',  'color',    'descripcion',  ''),
                        $genisa->parametros('combustion',       'Combustion',       'char',         '1',    'notnull','cons','','','combustiones','',''),
                        $genisa->parametros('tipo',             'Tipo de vehiculo', 'char',         '1',    'notnull','cons','','','tipos','',''),
                        $genisa->parametros('ano',              'Fecha de Egreso',  'timestamp',  '',    'null',   '','','','','',''),
                       ],
                'relaciones'  =>
                    [
                        // BelongsTo
                        $genisa->foreign(
                            'localidad_id',
                            'id',
                            'localidades',
                            'CASCADE',
                            'CASCADE',
                            'localidad',
                            'belongsTo',
                            'Localidad::class',
                            'empleado_id',
                            '',
                            ''),
                        // hasMany
                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
                            'usuario', 'hasMany', 'Empleado::class', 'usuario','', ''),
                    ],
                'constantes'  =>
                    [

                        $genisa->constantes('estado_civil',   'EMPLEADO_CASADO',        'c' , 'estados_civiles', 'Casado', 'Estado Civil'),
                        $genisa->constantes('estado_civil',   'EMPLEADO_DIVORCIADO',    'd' , 'estados_civiles', 'Divorciado', 'Estado Civil'),
                        $genisa->constantes('estado_civil',   'EMPLEADO_VIUDO',         'v' , 'estados_civiles', 'Viudo', 'Estado Civil'),
                        $genisa->constantes('estado_civil',   'EMPLEADO_SOLTERO',       's' , 'estados_civiles', 'Soltero', 'Estado Civil'),

                        $genisa->constantes('sexo',       'EMPLEADO_MASCULINO',         'm' , 'sexos',          'Masculino', 'Sexo'),
                        $genisa->constantes('sexo',       'EMPLEADO_FEMENINO',           'f' , 'sexos',         'Femenino', 'Sexo'),

                        $genisa->constantes('estado',   'EMPLEADO_ACTIVO',              '1' , 'estados',        'Activo', 'Estado'),
                        $genisa->constantes('estado',   'EMPLEADO_INACTIVO',            '2' , 'estados',        'Inactivo', 'Estado'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
