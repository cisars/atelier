<?php

namespace App\Http\Requests\Modelo;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreModeloRequest extends FormRequest
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
            'marca_id'             =>'required',
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('modelos', 'descripcion')
                    ->ignore($this->modelo, 'id')
                    ->where(function ($query) {
                        return $query->where('marca_id', $this->marca_id);
                    })
            ],
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
            'marca_id.required'        => 'Debe seleccionar una marca',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
