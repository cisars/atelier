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
            'localidad_id'         =>'required',
            'movil'             =>'required|max:20',
            'telefono'          =>'max:20',
            'cargo_id'             =>'required',
            'turno_id'             =>'required',
            'grupo_id'             =>'required',
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
            'apellidos.required'    => 'Debe introducir un apellido',
            'apellidos.max'         => 'No puede exceder 40 caracteres',
            'ci.required'           => 'Debe introducir una CI',
            'ci.max'                => 'No puede exceder 12 caracteres',
            'ci.unique'             => 'El registro ya existe',
            'estado_civil.required' => 'Debe introducir un estado civil',
            'sexo.required'         => 'Debe introducir un sexo',
            'localidad_id.required'    => 'Debe introducir una localidad',
            'direccion.required'    => 'Debe introducir una direccion',
            'direccion.max'         => 'No puede exceder 80 caracteres',
            'movil.required'         => 'Debe introducir un movil',
            'movil.max'             => 'No puede exceder 20 caracteres',
            'telefono.max'          => 'No puede exceder 12 caracteres',
            'cargo_id.required'        => 'Debe introducir un cargo',
            'turno_id.required'    => 'Debe introducir un turno',
            'grupo_id.required'    => 'Debe introducir un grupo',
            'estado.required'       => 'Debe introducir un estado',
            'salario.required'      => 'Debe introducir un salario',
            'salario.max'           => 'No puede exceder 12 cifras',

        ];
    }
}
