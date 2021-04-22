<?php

namespace App\Http\Requests\Reserva;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'taller_id'           =>'required',
            'cliente_id'           =>'required',
            'vehiculo_id'           =>'required',
            'empleado_id'           =>'required',
            'usuario'           =>'required',
            'ticket'           =>'required',
            'para_fecha'           =>'required',
            'prioridad'           =>'required',

        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *'required|max:80|unique:<<tabla>>,<<campo>>'
     * @return array
     */
    public function messages()
    {
        return [
            'taller_id.required'       => 'Debe seleccionar  taller',
            'cliente_id.required'       => 'Debe seleccionar  cliente',
            'vehiculo_id.required'       => 'Debe seleccionar  vehiculo',
            'empleado_id.required'       => 'Debe seleccionar  empleado',
            'usuario.required'       => 'Debe seleccionar  usuario',
            'ticket.required'       => 'Debe ingresar un ticket',
            'para_fecha.required'       => 'Debe ingresar una fecha futura',
            'prioridad.required'       => 'Debe seleccionar prioridad',

        ];
    }
}
