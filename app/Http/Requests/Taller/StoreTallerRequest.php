<?php

namespace App\Http\Requests\Taller;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTallerRequest extends FormRequest
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
          //  'descripcion'       =>'required|max:40|unique:talleres,descripcion,' . $this->taller . ',taller,localidad,' . $this->localidad,
            'localidad'         =>'required',
            'direccion'         =>'required|max:80',
            'telefono'          =>'required|max:12',
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('talleres', 'descripcion')
                    ->ignore($this->taller, 'taller')
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
            'localidad.required' => 'Debe seleccionar una localidad para el taller',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
            'direccion.required'  => 'Debe introducir una direccion',
            'direccion.max'       => 'La direccion no puede exceder 80 caracteres',
            'direccion.unique'    => 'El registro ya existe',
            'telefono.required'  => 'Debe introducir una descripcion',
            'telefono.max'       => 'Telefono no puede exceder 12 caracteres',
            'telefono.unique'    => 'El registro ya existe',
        ];
    }
}
