<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class RecepcionGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Recepciones   ' ,
                'ZNOMBREZ'    => 'Recepcion' ,
                'ZnombresZ'   => 'recepciones' ,
                'ZnombreZ'    => 'recepcion' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('taller_id',        'Taller',               'tinyint',  '',   'notnull','fk','',
                            'Taller','talleres','taller','descripcion',''),
                        $genisa->parametros('reserva_id',     'Reserva',            'smallint',  '',   'notnull','fk','',
                            'Reserva','reservas','reserva','descripcion',''),
                        $genisa->parametros('cliente_id',     'Cliente',            'smallint',  '',   'notnull','fk','',
                            'Cliente','clientes','cliente','razon_social',''),
                        $genisa->parametros('vehiculo_id',     'Vehiculo',            'smallint',  '',   'notnull','fk','',
                            'Vehiculo','vehiculos','vehiculo','chapa',''),

                        $genisa->parametros('fecha_recepcion',     'Fecha Recepción',   'timestamp','',   'notnull','','','','','','',''),
                        $genisa->parametros('usuario',     'Usuario',            'varchar',  '12',   'notnull','fk','',
                            'Usuario','usuarios','usuario','usuario',''),

                    ],
                'relaciones'  =>
                    [
                        $genisa->foreign('taller_id','id','talleres','CASCADE','CASCADE',
                            'taller', 'belongsTo', 'Taller::class', 'taller_id','', ''),
                        $genisa->foreign('reserva_id','id','reservas','CASCADE','CASCADE',
                            'reserva', 'belongsTo', 'Reserva::class', 'reserva_id','', ''),
                        $genisa->foreign('cliente_id','id','clientes','CASCADE','CASCADE',
                            'cliente', 'belongsTo', 'Cliente::class', 'cliente_id','', ''),
                        $genisa->foreign('vehiculo_id','id','vehiculos','CASCADE','CASCADE',
                            'vehiculo', 'belongsTo', 'Vehiculo::class', 'vehiculo_id','', ''),
                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
                            'usuario', 'belongsTo', 'Usuario::class', 'usuario','', ''),


//                        $genisa->foreign('usuario','usuario','usuarios','CASCADE','CASCADE',
//                            'usuario', 'hasMany', 'Empleado::class', 'usuario','', ''),

                    ],
                'constantes'  =>
                    [

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
