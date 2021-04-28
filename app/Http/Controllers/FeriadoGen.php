<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Storage;

class FeriadoGen extends Controller
{
    public function inicializar(Request $request)
    {
        system('php artisan make:model Models/'. $request->capital .' -fmc ', $rt);
        system('php artisan make:view '.$request->minuscula.'.index', $rt);
        system('php artisan make:view '.$request->minuscula.'.edit', $rt);
        system('php artisan make:request '.$request->capital.'/Store'.$request->capital.'Request', $rt);
        system('php artisan make:request '.$request->capital.'/Update'.$request->capital.'Request', $rt);
    }

    public function toFile( Request $request)
    {

        Storage::disk('gensystem')->put($request->capital.'Controller.php'      , $request->codigocontroller);
        Storage::disk('gensystem')->put($request->capital.'Model.php'           , $request->codigomodel);
        Storage::disk('gensystem')->put($request->capital. '/index.blade.php'   , $request->codigoindex);
        Storage::disk('gensystem')->put($request->capital. '/edit.blade.php'    , $request->codigoedit);
        Storage::disk('gensystem')->put('Factory/'.$request->capital.'Factory.php'    , $request->codigofake);
        Storage::disk('gensystem')->put($request->capital. '/Store'.$request->capital.'Request.php'    , $request->codigostore);
        Storage::disk('gensystem')->put($request->capital. '/Update'.$request->capital.'Request.php'    , $request->codigoupdate);

// system('xcopy '. env('ABSOLUTE_PATH') .'\public\app\Mail\Test\  '. env('ABSOLUTE_PATH') .'\app\Http\MiCont /r /y /z /t', $rt);
// system('xcopy '. env('ABSOLUTE_PATH') .trim('\public\app\Mail\Test\ ').$request->capital.'Controller.php '. env('ABSOLUTE_PATH') .'\app\Http\MiCont /r /y /z ', $rt);
// system('xcopy '. env('ABSOLUTE_PATH') .'\public\app\Mail\Test\aaaa\2.php  '. env('ABSOLUTE_PATH') .'\app\Http\MiCont\aaaa /r /y /z ', $rt);
        dd( $request->capital . ' | '. env('LOCAL_STORAGE_PATH'));
        // 'file.txt' // yo can use your file name here.
        // 'Your content here' // you can specify your content here
        return redirect()
            ->route('feriadogen.index')
            ->with('msg', 'Archivo generado')
            ->with('type', 'warning');
    }
    public function index()
    {
       // Storage::disk('local')->put('micodigonuevo.txt', 'test');
        $gen = new stdClass();
        $genisa = new MakeTemplateController();
        $tabla      =
            [
                'ZNOMBRESZ'   => 'Feriados' ,
                'ZNOMBREZ'    => 'Feriado' ,
                'ZnombresZ'   => 'feriados' ,
                'ZnombreZ'    => 'feriado' ,
                'columnas'  =>
                    [
                        $genisa->parametros('id',               'hidden',               'smallint', '' ,  'notnull', 'pk', 'autoincrement','','','',''),
                        $genisa->parametros('dia',              'Día',                  'tinyint',     '',   'null','','','','','','',''),
                        $genisa->parametros('mes',              'Mes',                  'tinyint',     '',   'null','','','','','','',''),
                        $genisa->parametros('descripcion',       'Descripción',          'varchar',  '40',   'notnull','','','','','','',''),
                        $genisa->parametros('estado',            'Estado',               'char',     '1',   'notnull','cons','','','estados','','',''),

                    ],
                'relaciones'  =>
                    [

                    ],
                'constantes'  =>
                    [
                        $genisa->constantes('estado',         'ESTADO_ACTIVO',          'a' ,  'estados',       'Estado Activo', 	'Estado Activo'),
                        $genisa->constantes('estado',         'ESTADO_INACTIVO',         'i' , 'estados',       'Estado Inactivo', 	'Estado Inactivo'),

                    ]

            ];
        $gen->dat = '001';
        $gen->tabla = $tabla;
        return view('_template.matrix', compact('gen', $gen)); // Lista con BelongsTo
    }
}
