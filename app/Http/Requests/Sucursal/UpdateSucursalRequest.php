<?php

namespace App\Http\Requests\Sucursal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSucursalRequest extends FormRequest
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
            'direccion'         =>'required|max:40',
            'telefono'          =>'required|max:12',
            'email'              =>'required|max:12|unique:sucursales,email,' . $this->sucursal . ',sucursal',
            'descripcion'        =>'required|max:40|unique:sucursales,descripcion,' . $this->sucursal . ',sucursal',

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
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
            'direccion.required'  => 'Debe introducir una direccion',
            'telefono.required'  => 'Debe introducir un telefono',
            'telefono.max'       => 'Telefono no puede exceder 12 caracteres',
            'email.required'  => 'Debe introducir un email',
            'email.max'       => 'Email no puede exceder 80 caracteres',
            'email.unique'    => 'El email ya existe',
        ];
    }
}
