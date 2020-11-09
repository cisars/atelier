<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaquinariaTipo\StoreMaquinariaTipoRequest;
use App\Http\Requests\MaquinariaTipo\UpdateMaquinariaTipoRequest;
use App\Models\MaquinariaTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MaquinariaTipoController extends Controller
{


    public function index()
    {
        $maquinarias_tipos = MaquinariaTipo::all();
        return View::make('maquinaria_tipo.index')
            ->with('maquinarias_tipos', $maquinarias_tipos);
    }
    public function create()
    {
        if($maquinarias_tipos = MaquinariaTipo::orderBy('descripcion', 'ASC')->get())
        return view('maquinaria_tipo.create')
            ->with('maquinarias_tipos', $maquinarias_tipos);
        else
            return view('maquinaria_tipo.create') ;
    }

    public function factory()
    {
        factory('App\Models\MaquinariaTipo')->create();
        return redirect()
            ->route('maquinaria_tipo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreMaquinariaTipoRequest $request)
    {

        $maquinaria_tipo = new MaquinariaTipo([
            'descripcion' => $request->get('descripcion')
        ]);
        $maquinaria_tipo->save();
        return redirect()
            ->route('maquinaria_tipo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(MaquinariaTipo $maquinaria_tipo)
    {
        //
    }

    public function edit(MaquinariaTipo $maquinaria_tipo)
    {
        return view('maquinaria_tipo.edit')
            ->with('maquinaria_tipo',$maquinaria_tipo) ;
    }

    public function update(UpdateMaquinariaTipoRequest $request, MaquinariaTipo $maquinaria_tipo)
    {

        $maquinaria_tipo->fill($request->all());
        $maquinaria_tipo->save();

        return redirect()
            ->route('maquinaria_tipo.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $maquinaria_tipo = MaquinariaTipo::findOrFail($request->maquinaria_tipo);
        $maquinaria_tipo->delete();

        return redirect()
            ->route('maquinaria_tipo.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
