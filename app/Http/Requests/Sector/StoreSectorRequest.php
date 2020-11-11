<?php

namespace App\Http\Requests\Sector;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSectorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'sucursal'          =>'required',
            'descripcion'       =>['required',
                'max:80',
                Rule::unique('sectores', 'descripcion')
                    ->ignore($this->sector, 'sector')
                    ->where(function ($query) {
                        return $query->where('sucursal', $this->sucursal);
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
            'sucursal.required'     => 'Debe seleccionar una sucursal',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 80 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }

}
