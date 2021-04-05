<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Descansos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Descanso
// $nombres  = $gen->tabla['ZnombresZ'] descansos
// $nombre   = $gen->tabla['ZnombreZ'] descanso
// GENISA Begin

namespace App\Http\Requests\Descanso;
use Illuminate\Foundation\Http\FormRequest;
class StoreDescansoRequest extends FormRequest
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
//           'id' =>'required',
            'parametro_id' =>'required',    //    required | alfa
            'desde' =>'required',    //    required | alfa
            'hasta' =>'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return  array
     */
    public function messages()
    {
        return [
            'parametro_id.required' => 'Debe introducir ParametroID',
            'desde.required' => 'Debe introducir Hora Desde',
            'hasta.required' => 'Debe introducir Hora Hasta',
        ];
    }
}
