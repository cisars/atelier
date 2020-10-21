<?php

namespace App\Http\Requests\Localidad;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocalidadRequest extends FormRequest
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
            'descripcion'       =>'required|max:60|unique:localidades,descripcion',
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
            'descripcion.required'  => 'Debe introducir un nombre para el cargo',
            'descripcion.max'       => 'El nombre del cargo no puede exceder 60 caracteres',
            'descripcion.unique'    => 'El cargo ingresado ya existe',
        ];
    }
}
