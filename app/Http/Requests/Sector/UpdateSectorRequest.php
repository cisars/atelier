<?php

namespace App\Http\Requests\Sector;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectorRequest extends FormRequest
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
            'sucursal'              =>'required',
            'descripcion'           =>['required',
                'max:40',
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
     *'required|max:80|unique:<<tabla>>,<<campo>>'
     * @return array
     */
    public function messages()
    {
        return [
            'sucursal.required'     => 'Debe seleccionar una sucursal',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
