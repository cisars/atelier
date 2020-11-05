<?php

namespace App\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateEmpleadoRequest extends FormRequest
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
    public function campoUnicoSQL($campo)
    {
        $tabla = 'empleados';
        $pk = 'empleado';

        Rule::unique($tabla, $campo)
            ->ignore($this->empleado, $pk)
            ->where(function ($query) {
                return $query
                    ->where($pk, $this->empleado);
            });
    }

    public function rules()
    {

        return [
            'nombres'           =>'required|max:40',
            'apellidos'         =>'required|max:40',
            'ci'                =>['required','max:12', $this->campoUnicoSQL('ci')],
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
            'fecha_ingreso'           =>'required',
            'salario'           =>'required|max:12',

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
            'nombres.required'      => 'Debe introducir un nombre',
            'nombres.max'           => 'Nombre no puede exceder 40 caracteres',
            'apellidos.required'    => 'Debe introducir un apellido',
            'apellidos.max'         => 'Apellido no puede exceder 40 caracteres',
            'ci.required'           => 'Debe introducir una CI valida',
            'ci.max'                => 'CI no puede exceder 12 caracteres',
            'ci.unique'             => 'El registro CI ya existe',
            'estado_civil.required'    => 'Debe introducir un estado civil',
            'sexo.required'         => 'Debe introducir un sexo',
            'localidad.required'    => 'Debe introducir una localidad',
            'direccion.required'    => 'Debe introducir una direccion',
            'direccion.max'         => 'No puede exceder 80 caracteres',
            'movil.required'        => 'Debe introducir un movil',
            'movil.max'             => 'No puede exceder 20 caracteres',
            'telefono.max'          => 'No puede exceder 12 caracteres',
            'cargo.required'        => 'Debe introducir un dato',
            'turno_empleado.required'    => 'Debe introducir un dato',
            'grupo_trabajo.required'    => 'Debe introducir un dato',
            'estado.required'       => 'Debe introducir un dato',
            'fecha_ingreso.required'  => 'Debe introducir una fecha de ingreso valida',
            'salario.required'      => 'Debe introducir un dato',
            'salario.max'           => 'No puede exceder 12 caracteres',
        ];
    }
}
