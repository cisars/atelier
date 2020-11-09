<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreColorRequest;
use App\Http\Requests\Color\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ColorController extends Controller
{


    public function index()
    {
        $colores = Color::all();
        return View::make('color.index')
            ->with('colores', $colores);
    }
    public function create()
    {
        if($colores = Color::orderBy('descripcion', 'ASC')->get())
        return view('color.create')
            ->with('colores', $colores);
        else
            return view('color.create') ;
    }

    public function factory()
    {
        factory('App\Models\Color')->create();
        return redirect()
            ->route('color.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'success');
    }

    public function store(StoreColorRequest $request)
    {

        $color = new Color([
            'descripcion' => $request->get('descripcion')
        ]);
        $color->save();
        return redirect()
            ->route('color.index')
            ->with('msg', 'Registro Creado Correctamente')
            ->with('type', 'info');
    }

public function show(Color $color)
    {
        //
    }

    public function edit(Color $color)
    {
        return view('color.edit')
            ->with('color',$color) ;
    }

    public function update(UpdateColorRequest $request, Color $color)
    {

        $color->fill($request->all());
        $color->save();

        return redirect()
            ->route('color.index')
            ->with('msg', 'Registro Actualizado Correctamente')
            ->with('type', 'info');
    }

    public function destroy(Request $request)
{
    $color = Color::findOrFail($request->color);
        $color->delete();

        return redirect()
            ->route('color.index')
            ->with('msg', 'Registro Eliminado Correctamente')
            ->with('type', 'danger');
    }
}
