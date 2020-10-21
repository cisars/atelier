<?php

namespace App\Http\Requests\Localidad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLocalidadRequest extends FormRequest
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
            'descripcion'   =>['required',
                'max:60',
                Rule::unique('localidades', 'descripcion')
                    ->ignore($this->localidad, 'localidad')
                    ->where(function ($query) {
                        return $query->where('localidad', $this->localidad);
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
            'descripcion.required'  => 'Debe introducir un nombre para la localidad',
            'descripcion.max'       => 'El nombre de localidad no puede exceder 60 caracteres',
            'descripcion.unique'    => 'La localidad ingresada ya existe',
        ];
    }
}

