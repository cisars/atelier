<?php


namespace App\Http\Requests\OrdenServicio;
use Illuminate\Foundation\Http\FormRequest;
class StoreOrdenServicioRequest extends FormRequest
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
//           'id' =>'required',   //           'ot_id' =>'required',   
           'servicio_id' =>'required',    //    required | alfa   max:8,2|required  | beta 
           'cantidad' =>'max:8,2|required',    //    required | alfa   max:200|required  | beta 
           'descripcion' =>'max:200|required',     //    // required // |   // max:1|required // | 
           'realizado' =>'max:1|required',    //    // required // |   // max:1|required // | 
           'verificado' =>'max:1|required',   //    
           'fecha_registro' =>'',   
           'usuario' =>'required',    //    required | alfa   max:200|required  | beta 
           'descripcion_verificacion' =>'max:200|required',   

        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    * @return  array
    */
    public function messages()
    {
    return [
        'ot_id.required' => 'Debe introducir OT',
        'servicio_id.required' => 'Debe introducir Servicio',
        'cantidad.required' => 'Debe introducir Cantidad',
        'cantidad.max' => 'Cantidad no puede exceder 8,2 de longitud',
        'descripcion.required' => 'Debe introducir Descripción',
        'descripcion.max' => 'Descripción no puede exceder 200 de longitud',
        'realizado.required' => 'Debe introducir Realizado',
        'realizado.max' => 'Realizado no puede exceder 1 de longitud',
        'verificado.required' => 'Debe introducir Verificado',
        'verificado.max' => 'Verificado no puede exceder 1 de longitud',
        'usuario.required' => 'Debe introducir Usuario',
        'usuario.max' => 'Usuario no puede exceder 12 de longitud',
        'descripcion_verificacion.required' => 'Debe introducir Descripción',
        'descripcion_verificacion.max' => 'Descripción no puede exceder 200 de longitud',
        ];
    }
}