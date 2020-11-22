<?php

namespace App\Http\Requests\Reserva;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReservaRequest extends FormRequest
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
            'taller'           =>'required',
            'cliente'           =>'required',
            'vehiculo'           =>'required',
            'empleado'           =>'required',
            'usuario'           =>'required',
            'ZZfk6ZZ'           =>'required',
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('reservas', 'descripcion')
                    ->ignore($this->reserva, 'reserva')
                    ->where(function ($query) {
                        return $query->where('taller', $this->taller);
                    })
            ],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'taller.required'       => 'Debe seleccionar  taller',
            'cliente.required'       => 'Debe seleccionar  cliente',
            'vehiculo.required'       => 'Debe seleccionar  vehiculo',
            'empleado.required'       => 'Debe seleccionar  empleado',
            'usuario.required'       => 'Debe seleccionar  usuario',
            'ZZfk6ZZ.required'       => 'Debe seleccionar  ZZfk6ZZ',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
