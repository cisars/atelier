<?php

namespace App\Http\Controllers;

use App\Http\Requests\Turno\StoreTurnoRequest;
use App\Http\Requests\Turno\UpdateTurnoRequest;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return View::make('turno.index')
            ->with('turnos', $turnos);
    }
    public function create()
    {
        if($turnos = Turno::orderBy('descripcion', 'ASC')->get())
        return view('turno.create')
            ->with('turnos', $turnos);
        else
            return view('turno.create') ;
    }

    public function factory()
    {
        factory('App\Models\Turno')->create();
        return redirect()
            ->route('turno.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreTurnoRequest $request)
    {

        $turno = new Turno([
            'descripcion' => $request->get('descripcion')
        ]);
        $turno->save();
        return redirect()
            ->route('turno.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

    public function show(Turno $turno)
    {
        //
    }

    public function edit(Turno $turno)
    {
        return view('turno.edit')
            ->with('turno',$turno) ;
    }

    public function update(UpdateTurnoRequest $request, Turno $turno)
    {

        $turno->fill($request->all());
        $turno->save();

        return redirect()
            ->route('turno.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $turno = Turno::findOrFail($request->turno_empleado);
        $turno->delete();

        return redirect()
            ->route('turno.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
