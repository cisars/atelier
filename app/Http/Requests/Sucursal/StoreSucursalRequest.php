<?php

namespace App\Http\Requests\Sucursal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSucursalRequest extends FormRequest
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
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('sucursales', 'descripcion')
                    ->ignore($this->id, 'id')
                    ->where(function ($query) {
                        return $query->where('localidad_id', $this->localidad_id);
                    })
            ],
            'direccion'         =>'required|max:40',
            'telefono'          =>'required|max:12',
            'email'             =>'required|max:80|unique:sucursales,email|email',
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
            'direccion.required'  => 'Debe introducir una descripcion',
            'direccion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'direccion.unique'    => 'El registro ya existe',
            'telefono.required'  => 'Debe introducir una descripcion',
            'telefono.max'       => 'La descripcion no puede exceder 40 caracteres',
            'telefono.unique'    => 'El registro ya existe',
            'email.required'  => 'Debe introducir una descripcion',
            'email.max'       => 'La descripcion no puede exceder 40 caracteres',
            'email.unique'    => 'El registro ya existe',
        ];
    }
}
