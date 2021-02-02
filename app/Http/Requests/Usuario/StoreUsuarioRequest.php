<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'usuario'           =>'required|max:12|unique:usuarios,usuario',
            'clave'             =>'required|max:20|',
            'estado'            =>'required',
            'tipo'              =>'required',
            'observacion'       =>'max:200',
            'taller_id'       =>'required',
            'perfil'       =>'required',

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
            'usuario.required'              => 'Debe introducir un usuario',
            'taller_id.required'          => 'Debe introducir un taller',
            'usuario.max'                   => 'Usuario no puede exceder 12 caracteres',
            'usuario.unique'                => 'El usuario ya existe',
            'clave.required'                => 'Debe introducir un clave',
            'clave.max'                     => 'La clave no puede exceder 20 caracteres',
            'estado.required'               => 'Debe introducir un estado ',
            'tipo.required'                 => 'Debe introducir un tipo ',
            'perfil.required'                 => 'Debe introducir un perfil ',
            'observacion.max'               => 'La observacion no puede exceder 200 caracteres ',
        ];
    }
}
