<?php

namespace App\Http\Requests\Grupos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateGrupoRequest extends FormRequest
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
        $tabla = 'grupos';
        $pk = 'grupo_trabajo';

        Rule::unique($tabla, $campo)
            ->ignore($this->grupo_trabajo, $pk)
            ->where(function ($query) {
                return $query
                    ->where($pk, $this->grupo_trabajo);
            });
    }

    public function rules()
    {
        return [
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
        ];
    }
}
