<?php

namespace App\Http\Controllers;

use App\Http\Requests\Taller\StoreTallerRequest;
use App\Http\Requests\Taller\UpdateTallerRequest;
use App\Models\Localidad;
use App\Models\Taller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TallerController extends Controller
{

    public function index()
    {

        if($talleres = Taller::orderBy('descripcion', 'ASC')->get()){
            $talleres = Taller::all();

            $talleres->each(function($taller)
            {
                $taller->localidad = Localidad::find($taller->localidad);
                //dd($taller->localidad);
            });
            return view('taller.index', compact('talleres', $talleres)); // Forma distinta para listar con BelongsTo
        }

    }
    public function create()
    {

        if($talleres = Taller::orderBy('descripcion', 'ASC')->get())
        {
            $localidades = Localidad::all();
            return view('taller.create')
                ->with('talleres', $talleres)
                ->with('localidades', $localidades);
        } else {
            return view('taller.create') ;
        }
    }

    public function factory()
    {
        factory('App\Models\Taller')->create();
        return redirect()
            ->route('taller.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreTallerRequest $request)
    {
        $taller = new Taller([
            'descripcion' => $request->get('descripcion'),
            'localidad' => $request->get('localidad'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
        ]);
        $taller->save();
        return redirect()
            ->route('taller.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Taller $taller)
    {
        //
    }

    public function edit(Taller $taller)
    {
        $localidades = Localidad::orderBy('descripcion', 'ASC')->get();
        return view('taller.edit')
            ->with('taller',$taller)
            ->with('localidades',$localidades);

    }

    public function update(UpdateTallerRequest $request, Taller $taller)
    {

        $taller->fill($request->all());
        $taller->save();

        return redirect()
            ->route('taller.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
    {
        // try {
        $taller = Taller::findOrFail($request->taller);
        $taller->delete();

        return redirect()
            ->route('taller.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
        //   } catch (\Illuminate\Database\QueryException $e) {
        //       //dd($e);
        //       return redirect()->route('taller.index')->with('error', $e->getMessage());
        //   }

    }
}
