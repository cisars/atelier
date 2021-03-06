<?php /*
################################################VARs#################################################
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

################################################VARs#################################################

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ZZNOMBREZZ;
use App\Models\ZZFK1ZZ;
use App\Models\ZZFK2ZZ;
use App\Models\ZZFK3ZZ;
use App\Models\ZZFK4ZZ;
use App\Models\ZZFK5ZZ;
use App\Models\ZZFK6ZZ;
use App\Http\Requests\ZZNOMBREZZ\StoreZZNOMBREZZRequest;
use App\Http\Requests\ZZNOMBREZZ\UpdateZZNOMBREZZRequest;

class ZZNOMBREZZController extends Controller
{
    public function index()
    {
        $ZZnombresZZ = ZZNOMBREZZ::orderBy('descripcion', 'ASC')->get();

        $ZZnombresZZ->each(function($ZZnombreZZ)
        {
            $ZZnombreZZ->ZZfk1ZZ = ZZFK1ZZ::find($ZZnombreZZ->ZZfk1ZZ);
            $ZZnombreZZ->ZZfk2ZZ = ZZFK2ZZ::find($ZZnombreZZ->ZZfk2ZZ);
            $ZZnombreZZ->ZZfk3ZZ = ZZFK3ZZ::find($ZZnombreZZ->ZZfk3ZZ);
            $ZZnombreZZ->ZZfk4ZZ = ZZFK4ZZ::find($ZZnombreZZ->ZZfk4ZZ);
            $ZZnombreZZ->ZZfk5ZZ = ZZFK5ZZ::find($ZZnombreZZ->ZZfk5ZZ);
            $ZZnombreZZ->ZZfk6ZZ = ZZFK6ZZ::find($ZZnombreZZ->ZZfk6ZZ);

            foreach ((new ZZNOMBREZZ())-><<getEstados1>>() as $clave=>$valor)
                trim($ZZnombreZZ->ZZestado1ZZ) == trim($valor) ? $ZZnombreZZ->ZZestado1ZZ = $clave : NULL ;

            foreach ((new ZZNOMBREZZ())-><<getEstados2>>() as $clave=>$valor)
                trim($ZZnombreZZ->ZZestado2ZZ) == trim($valor) ? $ZZnombreZZ->ZZestado2ZZ = $clave : NULL ;

            foreach ((new ZZNOMBREZZ())-><<getEstados3>>() as $clave=>$valor)
                trim($ZZnombreZZ->ZZestado3ZZ) == trim($valor) ? $ZZnombreZZ->ZZestado3ZZ = $clave : NULL ;
        });

        return view('ZZnombreZZ.index', compact('ZZnombresZZ', $ZZnombresZZ)); // Lista con BelongsTo
    }

    public function create()
    {
        $ZZnombresZZ = ZZNOMBREZZ::orderBy('descripcion', 'ASC')->get();

            $ZZnombreZZ   = new ZZNOMBREZZ();
            $<<estados1>>    = $ZZnombreZZ-><<getEstados1>>();
            $<<estados2>>    = $ZZnombreZZ-><<getEstados2>>();
            $<<estados3>>    = $ZZnombreZZ-><<getEstados3>>();

            $ZZfks1ZZ = ZZFK1ZZ::all();
            $ZZfks2ZZ = ZZFK2ZZ::all();
            $ZZfks3ZZ = ZZFK3ZZ::all();
            $ZZfks4ZZ = ZZFK4ZZ::all();
            $ZZfks5ZZ = ZZFK5ZZ::all();
            $ZZfks6ZZ = ZZFK6ZZ::all();
            return view('ZZnombreZZ.create')
                ->with('ZZnombresZZ', $ZZnombresZZ)
                ->with('ZZfks1ZZ', $ZZfks1ZZ)
                ->with('ZZfks2ZZ', $ZZfks2ZZ)
                ->with('ZZfks3ZZ', $ZZfks3ZZ)
                ->with('ZZfks4ZZ', $ZZfks4ZZ)
                ->with('ZZfks5ZZ', $ZZfks5ZZ)
                ->with('ZZfks6ZZ', $ZZfks6ZZ)
                ->with('<<estados1>>', $<<estados1>>)
                ->with('<<estados2>>', $<<estados2>>)
                ->with('<<estados3>>', $<<estados3>>)
                ;

    }

    public function factory()
    {
        factory('App\Models\ZZNOMBREZZ')->create();
        return redirect()
            ->route('ZZnombreZZ.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreZZNOMBREZZRequest $request)
    {
        $ZZnombreZZ = new ZZNOMBREZZ([
            'descripcion' => $request->get('descripcion'),
            'ZZfk1ZZ' => $request->get('ZZfk1ZZ'),
            'ZZfk2ZZ' => $request->get('ZZfk2ZZ'),
            'ZZfk3ZZ' => $request->get('ZZfk3ZZ'),
            'ZZfk4ZZ' => $request->get('ZZfk4ZZ'),
            'ZZfk5ZZ' => $request->get('ZZfk5ZZ'),
            'ZZfk6ZZ' => $request->get('ZZfk6ZZ'),
            'ZZestado1ZZ' => $request->get('ZZestado1ZZ'),
            'ZZestado2ZZ' => $request->get('ZZestado2ZZ'),
            'ZZestado3ZZ' => $request->get('ZZestado3ZZ'),
        ]);

        //        $ZZnombreZZ = new ZZNOMBREZZ($request->all());
        //        $ZZnombreZZ->save();

        $ZZnombreZZ->save();
        return redirect()
            ->route('ZZnombreZZ.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(ZZNOMBREZZ $ZZnombreZZ)
    {
        //
    }

    public function edit(ZZNOMBREZZ $ZZnombreZZ)
    {
        $ZZfks1ZZ = ZZFK1ZZ::orderBy('descripcion', 'ASC')->get();
        $ZZfks2ZZ = ZZFK2ZZ::orderBy('descripcion', 'ASC')->get();
        $ZZfks3ZZ = ZZFK3ZZ::orderBy('descripcion', 'ASC')->get();
        $ZZfks4ZZ = ZZFK4ZZ::orderBy('descripcion', 'ASC')->get();
        $ZZfks5ZZ = ZZFK5ZZ::orderBy('descripcion', 'ASC')->get();
        $ZZfks6ZZ = ZZFK6ZZ::orderBy('descripcion', 'ASC')->get();

        $<<estados1>> = $ZZnombreZZ-><<getEstados1>>();
        $<<estados2>> = $ZZnombreZZ-><<getEstados2>>();
        $<<estados3>> = $ZZnombreZZ-><<getEstados3>>();
        return view('ZZnombreZZ.edit')
            ->with('ZZnombreZZ',$ZZnombreZZ)
            ->with('ZZfks1ZZ',$ZZfks1ZZ)
            ->with('ZZfks2ZZ',$ZZfks2ZZ)
            ->with('ZZfks3ZZ',$ZZfks3ZZ)
            ->with('ZZfks4ZZ',$ZZfks4ZZ)
            ->with('ZZfks5ZZ',$ZZfks5ZZ)
            ->with('ZZfks6ZZ',$ZZfks6ZZ)
            ->with('<<estados1>>', $<<estados1>>)
            ->with('<<estados2>>', $<<estados2>>)
            ->with('<<estados3>>', $<<estados3>>)
            ;
    }

    public function update(UpdateZZNOMBREZZRequest $request, ZZNOMBREZZ $ZZnombreZZ)
    {
        $ZZnombreZZ->fill($request->all());
        $ZZnombreZZ->save();

        return redirect()
            ->route('ZZnombreZZ.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        $ZZnombreZZ = ZZNOMBREZZ::findOrFail($request->ZZnombreZZ);
        $ZZnombreZZ->delete();

        return redirect()
            ->route('ZZnombreZZ.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
