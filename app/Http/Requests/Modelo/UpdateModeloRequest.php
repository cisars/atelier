<?php

namespace App\Http\Requests\Modelo;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModeloRequest extends FormRequest
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
    public function campoUnicoSQL($campo)
    {
        $tabla = 'modelos';
        $pk = 'modelos';

        Rule::unique($tabla, $campo)
            ->ignore($this->modelo, $pk)
            ->where(function ($query) {
                return $query
                    ->where('marca', $this->marca);
            });
    }
    public function rules()
    {
//        return[
//            'descripcion'       =>['required','max:40', $this->campoUnicoSQL('descripcion')],
//
//        ];
        return [
            'descripcion'=>['required',
                'max:40',
                Rule::unique('modelos', 'descripcion')
                    ->ignore($this->modelo, 'modelo')
                    ->where(function ($query) {
                        return $query->where('marca', $this->marca);
                    })
            ],
        ];

//        return [
//            'descripcion'   =>'required|max:40|unique:modelos,descripcion,' . $this->modelo . ',modelo',
//        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *'required|max:80|unique:<<tabla>>,<<campo>>'
     * @return array
     */
    public function messages()
    {
        return [
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
        ];
    }


}
