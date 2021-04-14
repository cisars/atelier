<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Recepciones
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Recepcion
// $nombres  = $gen->tabla['ZnombresZ'] recepciones
// $nombre   = $gen->tabla['ZnombreZ'] recepcion
// GENISA Begin

namespace App\Http\Requests\Recepcion;
use Illuminate\Foundation\Http\FormRequest;
class StoreRecepcionRequest extends FormRequest
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
//           'id' =>'required',
            'taller_id' =>'required',
            'reserva_id' =>'required',
            'cliente_id' =>'required',
            'vehiculo_id' =>'required',    //    required | alfa
            'fecha_recepcion' =>'required',
            'usuario' =>'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return  array
     */
    public function messages()
    {
        return [
            'taller_id.required' => 'Debe introducir Taller',
            'reserva_id.required' => 'Debe introducir Reserva',
            'cliente_id.required' => 'Debe introducir Cliente',
            'vehiculo_id.required' => 'Debe introducir Vehiculo',
            'fecha_recepcion.required' => 'Debe introducir Fecha Recepción',
            'usuario.required' => 'Debe introducir Usuario',
            'usuario.max' => 'Usuario no puede exceder 12 de longitud',
        ];
    }
}
