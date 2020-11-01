<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cargo\StoreCargoRequest;
use App\Http\Requests\Cargo\UpdateCargoRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class CargoController extends Controller
{

    public function index()
    {
        $cargos = Cargo::all();
        return View::make('cargo.index')
            ->with('cargos', $cargos);
    }
    public function create()
    {
        if($cargos = Cargo::orderBy('descripcion', 'ASC')->get())
        return view('cargo.create')
            ->with('cargos', $cargos);
        else
            return view('cargo.create') ;
    }

    public function factory()
    {
        factory('App\Models\Cargo')->create();
        return redirect()
            ->route('cargo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreCargoRequest $request)
    {

        $cargo = new Cargo([
            'descripcion' => $request->get('descripcion')
        ]);
        $cargo->save();
        return redirect()
            ->route('cargo.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Cargo $cargo)
    {
        //
    }

    public function edit(Cargo $cargo)
    {
        return view('cargo.edit')
            ->with('cargo',$cargo) ;
    }

    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {

        $cargo->fill($request->all());
        $cargo->save();

        return redirect()
            ->route('cargo.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $cargo = Cargo::findOrFail($request->cargo);
        $cargo->delete();

        return redirect()
            ->route('cargo.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }

}
