<?php

namespace App\Http\Requests\EmpleadoMaquina;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoMaquinaRequest extends FormRequest
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

            'empleado_id' =>'required',
            'maquinaria_id' =>'required',    //    required | alfa   max:200|required  | beta
            'observacion' =>'max:200|required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return  array
     */
    public function messages()
    {
        return [
            'empleado_id.required' => 'Debe introducir Empleado',
            'maquinaria_id.required' => 'Debe introducir Maquinaria',
            'observacion.required' => 'Debe introducir Observación',
            'observacion.max' => 'Observación no puede exceder 200 de longitud',
        ];
    }
}
