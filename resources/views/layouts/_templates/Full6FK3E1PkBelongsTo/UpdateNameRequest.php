<?php

namespace App\Http\Requests\ZZNOMBREZZ;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateZZNOMBREZZRequest extends FormRequest
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
            'ZZfk1ZZ'           =>'required',
            'ZZfk2ZZ'           =>'required',
            'ZZfk3ZZ'           =>'required',
            'ZZfk4ZZ'           =>'required',
            'ZZfk5ZZ'           =>'required',
            'ZZfk6ZZ'           =>'required|max:80|unique:ZZnombresZZ,ZZfk6ZZ,' . $this->ZZnombreZZ . ',ZZnombreZZ',
            'descripcion'=>['required',
                'max:40',
                Rule::unique('ZZnombresZZ', 'descripcion')
                    ->ignore($this->ZZnombreZZ, 'ZZnombreZZ')
                    ->where(function ($query) {
                        return $query->where('ZZfk1ZZ', $this->ZZfk1ZZ);
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
            'ZZfk1ZZ.required'       => 'Debe seleccionar  ZZfk1ZZ',
            'ZZfk2ZZ.required'       => 'Debe seleccionar  ZZfk2ZZ',
            'ZZfk3ZZ.required'       => 'Debe seleccionar  ZZfk3ZZ',
            'ZZfk4ZZ.required'       => 'Debe seleccionar  ZZfk4ZZ',
            'ZZfk5ZZ.required'       => 'Debe seleccionar  ZZfk5ZZ',
            'ZZfk6ZZ.required'       => 'Debe seleccionar  ZZfk6ZZ',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }
}
