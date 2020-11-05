<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
           // 'usuario'           =>['required','max:12', $this->campoUnicoSQL('usuario')],
            'clave'             =>'required|max:20|',
            'estado'            =>'required',
            'tipo'              =>'required',
            'observacion'       =>'max:200',

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
//            'usuario.required'              => 'Debe introducir un usuario',
//            'usuario.max'                   => 'Usuario no puede exceder 12 caracteres',
//            'usuario.unique'                => 'El usuario ya existe',
            'clave.required'                => 'Debe introducir un clave',
            'clave.max'                     => 'La clave no puede exceder 20 caracteres',
            'estado.required'               => 'Debe introducir un estado ',
            'tipo.required'                 => 'Debe introducir un tipo ',
            'observacion.max'               => 'La observacion no puede exceder 200 caracteres ',
        ];
    }
}
