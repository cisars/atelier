<?php

namespace App\Http\Requests\Cargo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCargoRequest extends FormRequest
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
         //   'descripcion'       =>'required|max:40|unique:sucursales,descripcion',
            'localidad'         =>'required',
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('sucursales', 'descripcion')
                    ->ignore($this->sucursal, 'sucursal')
                    ->where(function ($query) {
                        return $query->where('marca', $this->marca);
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
            'localidad.required'  => 'Debe seleccionar una localidad',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
