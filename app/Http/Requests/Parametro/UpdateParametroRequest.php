<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Parametros
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Parametro
// $nombres  = $gen->tabla['ZnombresZ'] parametros
// $nombre   = $gen->tabla['ZnombreZ'] parametro
// GENISA Begin

namespace App\Http\Requests\Parametro;
use Illuminate\Foundation\Http\FormRequest;
class UpdateParametroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return  array
     */
    public function rules()
    {
        return [
            //            'id' =>'required',                //
            'descripcion' =>'',                    //
            'cantidad_prioridad_alta' =>'',                    //
            'jefe_mecanicos' =>'',                    //    required | alfa
            'periodicidad' =>'required',                    //    required | alfa
            'sectores' =>'required',                    //    required | alfa
            'hora_apertura' =>'required',                    //    required | alfa
            'hora_cierre' =>'required',                    //
            'hora_apertura_sab' =>'',                    //
            'hora_cierre_sab' =>'',                    //    required | alfa
            'activo' =>'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return  array
     */
    public function messages()
    {
        return [
            'periodicidad.required' => 'Debe introducir Periodicidad Min.',
            'sectores.required' => 'Debe introducir Cantidad de Sectores',
            'hora_apertura.required' => 'Debe introducir Hora de Apertura',
            'hora_cierre.required' => 'Debe introducir Hora de Cierre',
            'activo.required' => 'Debe introducir Activo',
        ];
    }
}
