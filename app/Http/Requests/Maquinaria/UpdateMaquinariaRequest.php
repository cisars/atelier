<?php

namespace App\Http\Requests\Maquinaria;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMaquinariaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'estado'                        =>'max:80',
            'maquinaria_tipo'             =>'required',
            'descripcion'=>['required',
                'max:80',
                Rule::unique('maquinarias', 'descripcion')
                    ->ignore($this->maquinaria, 'maquinaria')
                    ->where(function ($query) {
                        return $query->where('maquinaria_tipo', $this->maquinaria_tipo);
                    })
            ],
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
            'estado.max'           => 'Debe seleccionar un estado',
            'maquinaria_tipo.required'  => 'Debe seleccionar un tipo de maquinaria',
            'descripcion.required'      => 'Debe introducir una descripcion',
            'descripcion.max'           => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'        => 'El registro ya existe',
        ];
    }
}
