<?php

namespace App\Http\Requests\Vehiculo;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculoRequest extends FormRequest
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
            'cliente_id'           =>'required',
            'modelo_id'            =>'required',
            'chapa'             =>'required|max:12|unique:vehiculos,chapa',
            'chasis'            =>'required|max:12|unique:vehiculos,chasis',
            'color_id'             =>'required',
            'combustion'        =>'required',
            'tipo'              =>'required',
            'año'               =>'required',
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
            'cliente_id.required'      => 'Debe seleccionar  cliente',
            'modelo_id.required'       => 'Debe seleccionar  modelo',
            'chapa.required'        => 'Debe ingresar una chapa',
            'chapa.max'             => 'La chapa no puede exceder 12 caracteres',
            'chapa.unique'          => 'El registro ya existe',
            'chasis.required'       => 'Debe ingresar un chasis',
            'chasis.max'            => 'El chasis no puede exceder 12 caracteres',
            'chasis.unique'         => 'El registro ya existe',
            'color_id.required'        => 'Debe seleccionar  color',
            'combustion.required'   => 'Debe seleccionar tipo de combustion',
            'tipo.required'         => 'Debe seleccionar  tipo',
        ];
    }
}
