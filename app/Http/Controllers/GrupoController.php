<?php

namespace App\Http\Controllers;

use App\Http\Requests\Grupos\StoreGrupoRequest;
use App\Http\Requests\Grupos\UpdateGrupoRequest;
use App\Models\Grupo;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return View::make('grupo.index')
            ->with('grupos', $grupos);
    }
    public function create()
    {
        if($grupos = Grupo::orderBy('descripcion', 'ASC')->get())
        return view('grupo.create')
            ->with('grupos', $grupos);
        else
            return view('grupo.create') ;
    }

    public function factory()
    {
        factory('App\Models\Grupo')->create();
        return redirect()
            ->route('grupo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreGrupoRequest $request)
    {

        $grupo = new Grupo([
            'descripcion' => $request->get('descripcion')
        ]);
        $grupo->save();
        return redirect()
            ->route('grupo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Grupo $grupo)
    {
        //
    }

    public function edit(Grupo $grupo)
    {
        return view('grupo.edit')
            ->with('grupo',$grupo) ;
    }

    public function update(UpdateGrupoRequest $request, Grupo $grupo)
    {

        $grupo->fill($request->all());
        $grupo->save();

        return redirect()
            ->route('grupo.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $grupo = Grupo::findOrFail($request->grupo_trabajo);
        $grupo->delete();

        return redirect()
            ->route('grupo.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
