<?php

namespace App\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
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
            'nombres'           =>'required|max:40',
            'apellidos'         =>'required|max:40',
            'ci'                =>'required|max:12|unique:empleados,ci',
            'estado_civil'      =>'required',
            'sexo'              =>'required',
            'direccion'         =>'required|max:80',
            'localidad'         =>'required',
            'movil'             =>'required|max:20',
            'telefono'          =>'max:20',
            'cargo'             =>'required',
            'turno_empleado'             =>'required',
            'grupo_trabajo'             =>'required',
            'estado'            =>'required',
            'salario'           =>'required|max:12',
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
            'nombres.required'      => 'Debe introducir un nombre',
            'nombres.max'           => 'Nombre no puede exceder 40 caracteres',
            'apellidos.required'    => 'Debe introducir un dato',
            'apellidos.max'         => 'No puede exceder 40 caracteres',
            'ci.required'           => 'Debe introducir un dato',
            'ci.max'                => 'No puede exceder 12 caracteres',
            'ci.unique'             => 'El registro ya existe',
            'estado_civil.required' => 'Debe introducir un dato',
            'sexo.required'         => 'Debe introducir un dato',
            'localidad.required'    => 'Debe introducir un dato',
            'direccion.required'    => 'Debe introducir un dato',
            'direccion.max'         => 'No puede exceder 80 caracteres',
            'movil.required'         => 'Debe introducir un dato',
            'movil.max'             => 'No puede exceder 20 caracteres',
            'telefono.max'          => 'No puede exceder 12 caracteres',
            'cargo.required'        => 'Debe introducir un dato',
            'turno_empleado.required'    => 'Debe introducir un dato',
            'grupo_trabajo.required'    => 'Debe introducir un dato',
            'estado.required'       => 'Debe introducir un dato',
            'salario.required'      => 'Debe introducir un dato',
            'salario.max'           => 'No puede exceder 12 cifras',

        ];
    }
}
