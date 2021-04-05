{{'<?php'}}

{{--CONFIGURACION--}}
// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] {{ $NOMBRES  = $gen->tabla['ZNOMBRESZ']}}
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] {{ $NOMBRE   = $gen->tabla['ZNOMBREZ']}}
// $nombres  = $gen->tabla['ZnombresZ'] {{ $nombres  = $gen->tabla['ZnombresZ']}}
// $nombre   = $gen->tabla['ZnombreZ'] {{ $nombre   = $gen->tabla['ZnombreZ']}}
// GENISA Begin

namespace App\Http\Controllers;

use App\Http\Requests\{{$NOMBRE}}\Store{{$NOMBRE}}Request;
use App\Http\Requests\{{$NOMBRE}}\Update{{$NOMBRE}}Request;
use App\Models\{{$NOMBRE}};
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
use App\Models\{{$dataCol['FK']}};
@endif
@endforeach
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class {{$NOMBRE}}Controller extends Controller
{

    public function index()
    {
        ${{$nombres}} = {{$NOMBRE}}::all();
        ${{$nombres}}->each(function (${{$nombre}}) {

        @foreach ($gen->tabla['constantes'] as $dataCons)
        ${{$nombre}}->{{$dataCons['nombres']}} === {{$NOMBRE}}::{{$dataCons['clave']}}   ? ${{$nombre}}->{{$dataCons['nombres']}} = '{{$dataCons['clave']}}' : "" ;
        @endforeach

        });
        return view('{{$nombre}}.index', compact('{{$nombres}}', ${{$nombres}}));
    }

    public function create()
    {
// Get all data fk tables
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
        ${{$dataCol['fks']}} = {{$dataCol['FK']}}::orderBy('{{$dataCol['orderby']}}', 'ASC')->get();
@endif
@endforeach

        ${{$nombre}}   = new {{$NOMBRE}}(); // {{$aux = null}}
// Construct all cons data base model dropdown list char 1
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
        ${{ $dataCons['nombres'] }} = ${{$nombre}}->get{{ucfirst($dataCons['nombres'])}}() ; // {{$aux = $dataCons['nombres']}}
@endif
@endforeach

        return view('{{$nombre}}.edit')
// Send all fk variables
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk' || $dataCol['cardinalidad'] == 'cons')
            ->with('{{$dataCol['fks']}}', ${{$dataCol['fks']}})
@endif
@endforeach
// Send all cons variables
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
            ->with('{{ $dataCons['nombres'] }}', ${{ $dataCons['nombres'] }})  // {{$aux = $dataCons['nombres']}}
@endif
@endforeach
;
    }

    public function store(Store{{$NOMBRE}}Request $request )
    {
        try {
        DB::beginTransaction();

            ${{$nombre}} = new {{$NOMBRE}}($request->all());
            ${{$nombre}}->save();

@foreach ($gen->tabla['relaciones'] as $dataCol)
    @if ($dataCol['eloquent'] == 'belongsToMany' || $dataCol['eloquent'] == 'manyToMany'  )
           foreach ($request->{{ $dataCol['foreign'] }} as $item) {
               $talleresusuarios = new {{ $dataCol['related'] }}();
               $talleresusuarios->{{ $dataCol['foreign'] }}    = $item;
               $talleresusuarios->{{$nombre}}_id      = $usuario->{{$nombre}}_id;
               $talleresusuarios->save();
           }
    @endif
@endforeach

            DB::commit();

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
        }
        return redirect()
            ->route('{{$nombre}}.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        try {
            ${{$nombre}} = {{$NOMBRE}}::findOrFail($request->id);
            ${{$nombre}}->delete();

            return redirect()
                ->route('{{$nombre}}.index')
                ->with('msg', 'Registro Eliminado Correctamente')
                ->with('type', 'danger');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd($e);
            return redirect()->route('{{$nombre}}.index')->with('error', $e->getMessage());
        }
    }

    public function edit({{$NOMBRE}} ${{$nombre}})
    {
// Get all data fk tables
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
        ${{$dataCol['fks']}} = {{$dataCol['FK']}}::orderBy('{{$dataCol['orderby']}}', 'ASC')->get();
@endif
@endforeach

// Set all function cons base model dropdown list char 1 {{$aux = NULL}}
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
        ${{ $dataCons['nombres'] }} = ${{$nombre}}->get{{ucfirst($dataCons['nombres'])}}() ; // {{$aux = $dataCons['nombres']}}
@endif
@endforeach

        return view('{{$nombre}}.edit')
            ->with('{{$nombre}}', ${{$nombre}})
// Send all fk variables
@foreach ($gen->tabla['columnas'] as $dataCol)
@if ($dataCol['cardinalidad'] == 'fk')
            ->with('{{$dataCol['fks']}}', ${{$dataCol['fks']}})
@endif
@endforeach

// Send all cons variables {{$aux = NULL}}
@foreach ($gen->tabla['constantes'] as $dataCons)
@if($aux != $dataCons['nombres'])
            ->with('{{ $dataCons['nombres'] }}', ${{ $dataCons['nombres'] }})  // {{$aux = $dataCons['nombres']}}
@endif
@endforeach
;
    }

    public function update(Update{{$NOMBRE}}Request $request, {{$NOMBRE}} ${{$nombre}})
    {
        try {
            DB::beginTransaction();
            ${{$nombre}}->fill($request->all());
            ${{$nombre}}->save();
            DB::commit();
            return redirect()
                ->route('{{$nombre}}.index')
                ->with('msg', 'Registro Actualizado Correctamente')
                ->with('type', 'info');
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()
                ->route('{{$nombre}}.index')
                ->with('type', 'danger')
                ->with('msg', 'Ocurrio un error');
        }
//
//        $requestData = $request->all();
////        $requestData['fecha_ingreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_ingreso')));
////        $requestData['fecha_egreso'] = date("Y-m-d H:i:s", strtotime(request('fecha_egreso')));
//        $empleado->fill($requestData);
//        $empleado->save();


    }
    public function factory()
    {
        factory('App\Models\{{$NOMBRE}}')->create();
        return redirect()
            ->route('{{$nombre}}.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }
}

{{'?>'}}

