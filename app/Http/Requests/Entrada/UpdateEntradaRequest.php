<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] Entradas
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] Entrada
// $nombres  = $gen->tabla['ZnombresZ'] entradas
// $nombre   = $gen->tabla['ZnombreZ'] entrada
// GENISA Begin

namespace App\Http\Requests\Entrada;
use Illuminate\Foundation\Http\FormRequest;
class StoreEntradaRequest extends FormRequest
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
           'taller_id' =>'required',   
           'ot_id' =>'required',    //    required | alfa   max:12|required  | beta 
           'numero_documento' =>'max:12|required',    //    
           'fecha' =>'',   
           'empleado_id' =>'required',   
           'usuario' =>'required',   

        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    * @return  array
    */
    public function messages()
    {
    return [
        'taller_id.required' => 'Debe introducir Taller',
        'ot_id.required' => 'Debe introducir OT',
        'numero_documento.required' => 'Debe introducir Nro Documento',
        'numero_documento.max' => 'Nro Documento no puede exceder 12 de longitud',
        'empleado_id.required' => 'Debe introducir Empleado',
        'usuario.required' => 'Debe introducir Usuario',
        'usuario.max' => 'Usuario no puede exceder 12 de longitud',
        ];
    }
}