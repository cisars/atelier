<?php

namespace App\Http\Requests\Sucursal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSucursalRequest extends FormRequest
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
        $tabla = 'sucursales';
        $pk = 'sucursal';

        Rule::unique($tabla, $campo)
            ->ignore($this->sucursal, $pk)
            ->where(function ($query) {
                return $query
                    ->where($pk, $this->sucursal);
            });
    }

    public function rules()
    {
        return [
            'direccion'         =>'required|max:40',
            'telefono'          =>'required|max:12',
            'email'             =>['required','max:80', $this->campoUnicoSQL('email')],
            'descripcion'       =>['required','max:40', $this->campoUnicoSQL('descripcion')],
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
            'descripcion.required'  => 'Debe introducir una descripcion',
            'descripcion.max'       => 'La descripcion no puede exceder 40 caracteres',
            'descripcion.unique'    => 'El registro ya existe',
            'direccion.required'  => 'Debe introducir una direccion',
            'telefono.required'  => 'Debe introducir un telefono',
            'telefono.max'       => 'Telefono no puede exceder 12 caracteres',
            'email.required'  => 'Debe introducir un email',
            'email.max'       => 'Email no puede exceder 80 caracteres',
            'email.unique'    => 'El email ya existe',
        ];
    }
}
