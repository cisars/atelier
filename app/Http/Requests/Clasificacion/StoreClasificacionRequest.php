<?php

namespace App\Http\Requests\Clasificacion;

use Illuminate\Foundation\Http\FormRequest;

class StoreClasificacionRequest extends FormRequest
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
            'descripcion'       =>'required|max:40|unique:clasificaciones,descripcion',
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
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
