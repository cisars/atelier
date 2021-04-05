<?php

namespace App\Http\Controllers;

use Blade;
use Illuminate\Http\Request;
use stdClass;

class EmpleadoGen extends Controller
{
    public function index()
    {

        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Empleados' ,
                'ZNOMBREZ'    => 'Empleado' ,
                'ZnombresZ'   => 'empleados' ,
                'ZnombreZ'    => 'empleado' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'int',      '10' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('nombres',          'Nombres',              'varchar',  '40' ,  'notnull','','','','','',''),
                        $genisa->parametros('apellidos',        'Apellidos',            'varchar',  '40' ,  'notnull','','','','','',''),
                        $genisa->parametros('ci',               'Cedula de Identidad',  'numeric',  '12,0' , 'notnull','unique','','','','',''),
                        $genisa->parametros('estado_civil',     'Estado Civil',         'char',     '1',    'notnull','cons','','','estados_civiles','',''),
                        $genisa->parametros('sexo',             'Sexo',                 'char',     '1',    'notnull','cons','','','sexos','',''),
                        $genisa->parametros('direccion',        'Direccion',            'varchar',  '80',   'notnull','','','','','',''),
                        $genisa->parametros('localidad_id',     'Localidad',            'smallint', '',     'notnull', 'fk',
                                '', 'Localidad',    'localidades','localidad',  'descripcion','full_name'),
                        $genisa->parametros('movil',            'Móvil',                'varchar',  '20',   'notnull','','','','','',''),
                        $genisa->parametros('telefono',         'Teléfono',             'varchar',  '20',   'null',   '','','','','',''),
                        $genisa->parametros('cargo_id',         'Cargo',                'tinyint',  '',     'notnull', 'fk',
                                '', 'Cargo',        'cargos',   'cargo',    'descripcion',''),
                        $genisa->parametros('turno_id',         'Turno de Trabajo',     'tinyint',  '',     'notnull', 'fk',
                                '', 'Turno',        'turnos',   'turno',    'descripcion',''),
                        $genisa->parametros('grupo_id',         'Grupo de Trabajo',     'tinyint',  '',     'notnull', 'fk',
                                '', 'Grupo',        'grupos',   'grupo',    'descripcion',''),
                        $genisa->parametros('fecha_nacimiento', 'Fecha de Nacimiento',  'date',   '',     'null',   '','','','','',''),
                        $genisa->parametros('fecha_ingreso',    'Fecha de Ingreso',     'timestamp', '',    'notnull','','','','','',''),
                        $genisa->parametros('estado',           'Estado',               'char',     '1',    'notnull','cons','','','estados','',''),
                        $genisa->parametros('fecha_egreso',     'Fecha de Egreso',      'timestamp',  '',    'null',   '','','','','',''),
                        $genisa->parametros('motivo_egreso',    'Motivo de Egreso',     'varchar',  '200',  'null',   '','','','','',''),
                        $genisa->parametros('salario',          'Salario',              'numeric',  '12,0', 'notnull','','','','','',''),
                    ],
                'relaciones'  =>
                    [
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
                        $genisa->foreign('cargo_id','id','cargos','CASCADE','CASCADE',
                            'cargo', 'belongsTo', 'Cargo::class', 'cargo_id','', ''),
                        $genisa->foreign('turno_id','id','turnos','CASCADE','CASCADE',
                            'turno', 'belongsTo', 'Localidad::class', 'turno_id','', ''),
                        $genisa->foreign('grupo_id','id','grupos','CASCADE','CASCADE',
                            'grupo', 'belongsTo', 'Localidad::class', 'grupo_id','', ''),

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

