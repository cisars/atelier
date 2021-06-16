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
            'taller_id'              =>'required',
            'descripcion'           =>['required',
                'max:40',
                Rule::unique('sectores', 'descripcion')
                    ->ignore($this->id, 'sector')
                    ->where(function ($query) {
                        return $query->where('taller_id', $this->taller_id);
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
            'taller_id.required'     => 'Debe seleccionar un taller',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
