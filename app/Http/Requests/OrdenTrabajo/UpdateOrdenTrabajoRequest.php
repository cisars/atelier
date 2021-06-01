<?php

// $NOMBRES  = $gen->tabla['ZNOMBRESZ'] OrdenesTrabajos
// $NOMBRE   = $gen->tabla['ZNOMBREZ'] OrdenTrabajo
// $nombres  = $gen->tabla['ZnombresZ'] ordenes_trabajos
// $nombre   = $gen->tabla['ZnombreZ'] orden_trabajo
// GENISA Begin

namespace App\Http\Requests\OrdenTrabajo;
use Illuminate\Foundation\Http\FormRequest;
class StoreOrdenTrabajoRequest extends FormRequest
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
           'taller_id' =>'required',    //    
           'fecha_recepcion' =>'',    //    
           'fecha_fin' =>'',   
           'recepcion_id' =>'required',   
           'cliente_id' =>'required',   
           'vehiculo_id' =>'required',   
           'empleado_id' =>'required',   
           'grupo_id' =>'required',     //    // required // |   // max:1|required // | 
           'tipo' =>'max:1|required',    //    // required // |   // max:1|required // | 
           'prioridad' =>'max:1|required',    //    // required // |   // max:1|required // | 
           'estado' =>'max:1|required',   //    required | alfa   max:200|required  | beta 
           'descripcion' =>'max:200|required',    //    required | alfa   max:12,0|required  | beta 
           'importe_total' =>'max:12,0|required',   
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
        'recepcion_id.required' => 'Debe introducir Recepción',
        'cliente_id.required' => 'Debe introducir Cliente',
        'vehiculo_id.required' => 'Debe introducir Vehículo',
        'empleado_id.required' => 'Debe introducir Empleado',
        'grupo_id.required' => 'Debe introducir Grupo de Trabajo',
        'tipo.required' => 'Debe introducir Tipo',
        'tipo.max' => 'Tipo no puede exceder 1 de longitud',
        'prioridad.required' => 'Debe introducir Prioridad',
        'prioridad.max' => 'Prioridad no puede exceder 1 de longitud',
        'estado.required' => 'Debe introducir Estado',
        'estado.max' => 'Estado no puede exceder 1 de longitud',
        'descripcion.required' => 'Debe introducir Descripción',
        'descripcion.max' => 'Descripción no puede exceder 200 de longitud',
        'importe_total.required' => 'Debe introducir Importe Total',
        'importe_total.max' => 'Importe Total no puede exceder 12,0 de longitud',
        'usuario.required' => 'Debe introducir Usuario',
        'usuario.max' => 'Usuario no puede exceder 12 de longitud',
        ];
    }
}