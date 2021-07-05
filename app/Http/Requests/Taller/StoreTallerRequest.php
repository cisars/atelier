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
            'sucursal_id'         =>'required',
            'direccion'         =>'required|max:80',
            'telefono'          =>'required|max:12',
            'descripcion'       =>['required',
                'max:40',
                Rule::unique('talleres', 'descripcion')
                    ->ignore($this->id, 'id')
                    ->where(function ($query) {
                        return $query->where('sucursal_id', $this->sucursal_id);
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
            'sucursal_id.required' => 'Debe seleccionar una sucursal para el taller',
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
            'direccion.required'  => 'Debe introducir una direccion',
            'direccion.max'       => 'La direccion no puede exceder 80 caracteres',
            'direccion.unique'    => 'El registro ya existe',
            'telefono.required'  => 'Debe introducir una descripcion',
            'telefono.max'       => 'Teléfono no puede exceder 12 caracteres',
            'telefono.unique'    => 'El registro ya existe',
        ];
    }
}
