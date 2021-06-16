<?php

namespace App\Http\Controllers;

use App\Http\Requests\Taller\StoreTallerRequest;
use App\Http\Requests\Taller\UpdateTallerRequest;
use App\Models\Empleado;
use App\Models\Localidad;
use App\Models\Taller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TallerController extends Controller
{

    public function index()
    {
        $talleres = Taller::all();
        $localidades = Localidad::all();
        return view('taller.index', compact('talleres', 'localidades'));
    }
    public function create()
    {
        $talleres = Taller::orderBy('descripcion', 'ASC')->get();
        $localidades = Localidad::all();

        return view('taller.create')
            ->with('talleres', $talleres)
            ->with('localidades', $localidades);
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

        $taller = new Taller($request->all());
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

    public function usuarios()
    {
        $usuarios = Usuario::whereHas('talleres')->get();

        return \view('talleres_usuarios.index', compact('usuarios'));
    }
    public function crearAsignacion()
    {
        $usuarios = Usuario::pluck('usuario', 'usuario');
        $talleres = Taller::pluck('descripcion', 'id');
        return \view('talleres_usuarios.create', compact('usuarios', 'talleres'));
    }

    public function asignarUsuarioTaller(Request $request)
    {
        try {

            Usuario::find($request->usuario)->talleres()->attach($request->taller);

            session()->flash('msg', 'Asignación realizada exitósamente');
            session()->flash('type', 'success');

            return redirect()->route('taller.usuarios');
        }catch (\Exception $e){
            dd($e->getMessage());
            session()->flash('msg', 'No se pudo asignar el usuario al taller');
            session()->flash('type', 'error');

            return redirect()->route('taller.usuarios');
        }
    }

    public function desasignarUsuario($usuario, $taller)
    {
        try {
            DB::beginTransaction();

            Usuario::find($usuario)->talleres()->detach($taller);

            DB::commit();

            session()->flash('msg', 'Asignación eliminada');
            session()->flash('type', 'success');

            return redirect()->back();
        }catch (\Exception $e){
            DB::rollBack();

            dd($e->getMessage());

            session()->flash('msg', 'No se pudo eliminar la asignación');
            session()->flash('type', 'error');

            return redirect()->back();
        }
    }
}
