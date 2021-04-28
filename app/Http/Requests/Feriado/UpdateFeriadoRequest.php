<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Feriados
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Feriado
// $nombres  = $gen->tabla['ZnombresZ'] feriados
// $nombre   = $gen->tabla['ZnombreZ'] feriado
// GENISA Begin

namespace App\Http\Requests\Feriado;
use Illuminate\Foundation\Http\FormRequest;
class UpdateFeriadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return  array
     */
    public function rules()
    {
        return [
            //            'id' =>'required',                //
            'dia' =>'required',                    //
            'mes' =>'required',                    //    required | alfa   max:40|required  | beta
            'descripcion' =>'max:40|required',                                 //    // required // |   // max:1|required // |
            'estado' =>'max:1|required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return  array
     */
    public function messages()
    {
        return [
            'descripcion.required' => 'Debe introducir Descripción',
            'descripcion.max' => 'Descripción no puede exceder 40 de longitud',
            'estado.required' => 'Debe introducir Estado',
            'estado.max' => 'Estado no puede exceder 1 de longitud',
        ];
    }
}
