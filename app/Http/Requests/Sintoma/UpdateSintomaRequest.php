<?php

namespace App\Http\Requests\Sintoma;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSintomaRequest extends FormRequest
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
            'descripcion'   =>'required|max:80|unique:sintomas,descripcion,' . $this->sintoma . ',sintoma',
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
            'descripcion.max'       => 'La descripcion no puede exceder 80 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }

}
