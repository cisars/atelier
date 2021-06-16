<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function create($ot, $fechahora, $estado = false, $descripcion = false)
    {
        try {
            DB::beginTransaction();

            $bitacora = new Bitacora();
            $bitacora->ot_id = $ot;
            $bitacora->estado = $estado;
            $bitacora->fechahora = $fechahora;

            if ($estado) {
                $bitacora->estado = $estado;
            }

            if ($descripcion) {
                $bitacora->descripcion = $descripcion;
            }
            $bitacora->save();

            DB::commit();

            return true;
        }catch (\Exception $e){
            DB::rollBack();

            \Log::error('Error en BitacoraController@create - Line: '.$e->getLine().' - Message: '.$e->getMessage());

            return false;
        }
    }
}
