<?php

namespace App\Http\Requests\Unidad;

use Illuminate\Foundation\Http\FormRequest;
class UpdateUnidadRequest extends FormRequest
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
            'descripcion'   =>'required|max:40|unique:unidades,descripcion,' . $this->unidad . ',unidad',
            'sigla'         =>'required|max:12|unique:unidades,sigla,' . $this->unidad . ',unidad',

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
            'sigla.required'  => 'Debe introducir una sigla',
            'sigla.max'       => 'La sigla no puede exceder 12 caracteres',
            'sigla.unique'    => 'El registro ya existe',

        ];
    }
}
