<?php

namespace App\Http\Controllers;

use Blade;
use Illuminate\Http\Request;
use stdClass;

class ProductoServicioGen extends Controller
{

    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla =
            [
                'ZNOMBRESZ' => 'ProductosServicios',
                'ZNOMBREZ' => 'ProductoServicio',
                'ZnombresZ' => 'productos_servicios',
                'ZnombreZ' => 'producto_servicio',
                'columnas' =>
                    [
                        $genisa->parametros('id', 'hidden', 'smallint', '', 'notnull', 'pk', 'autoincrement', '', '', '', ''),
                        $genisa->parametros('codigo', 'Codigo', 'varchar', '15', 'notnull', '', '', '', '', '', '', ''),
                        $genisa->parametros('descripcion', 'Descripcion', 'varchar', '80', 'notnull', '', '', '', '', '', '', ''),
                        $genisa->parametros('clasificacion_id', 'Clasificacion', 'tinyint', '', 'notnull', 'fk',  '',
                            'Clasificacion', 'clasificaciones', 'clasificacion', 'descripcion', ''),
                        $genisa->parametros('unidad_id', 'Unidad', 'tinyint', '', 'notnull', 'fk',  '',
                            'Unidad', 'unidades', 'unidad', 'descripcion', ''),
                        $genisa->parametros('impuesto', 'Impuesto', 'tinyint', '', 'notnull', '',  '', '', '', '', 'descripcion', ''),
                        $genisa->parametros('precio_venta', 'Precio de Venta', 'numeric', '12,0', 'notnull', '',  '', '', '', '', 'descripcion', ''),
                        $genisa->parametros('estado',            'Estado',               'char',     '1',   'notnull','cons','','','estados','','',''),

                    ],
                'relaciones' =>
                    [
                        $genisa->foreign('clasificacion_id', 'id', 'clasificaciones', 'CASCADE', 'CASCADE',
                            'clasificacion', 'belongsTo', 'Clasificacion::class', 'clasificacion_id', '', ''),
                        $genisa->foreign('unidad_id', 'id', 'unidades', 'CASCADE', 'CASCADE',
                            'unidad', 'belongsTo', 'Unidad::class', 'unidad_id', '', ''),

                        $genisa->foreign('vehiculo_id', 'id', 'vehiculos', 'CASCADE', 'CASCADE',
                            'vehiculos', 'hasMany', 'Cliente::class', 'vehiculo_id', '', ''),
                        $genisa->foreign('reserva_id', 'id', 'reservas', 'CASCADE', 'CASCADE',
                            'reservas', 'hasMany', 'Cliente::class', 'reserva_id', '', ''),

                        $genisa->foreign('sector_id','id','existencias_manejos','CASCADE','CASCADE',
                            'sectores', 'belongsToMany', 'ExistenciaManejo::class', 'producto_id','sector_id', 'Sector'),

                    ],
                'constantes' =>
                    [
                        $genisa->constantes('estado',         'ESTADO_ACTIVO',          'a' ,  'estados',       'Estado Activo', 	'Estado Activo'),
                        $genisa->constantes('estado',         'ESTADO_INACTIVO',         'i' , 'estados',       'Estado Inactivo', 	'Estado Inactivo'),

                    ]

            ];
        $gen->tabla = $tabla;
        $gen->dat = '001';
        $gen->fake = $constantes = [
            0 => 'constante1',
            1 => 'constante2',
            2 => 'constante3',
        ];
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}


