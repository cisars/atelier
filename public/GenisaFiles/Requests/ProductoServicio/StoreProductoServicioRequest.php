<?php

namespace App\Http\Requests\ProductoServicio;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductoServicioRequest extends FormRequest
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
//           'id' =>'required',    //    required | alfa   max:15|required  | beta 
           'codigo' =>'max:15|required',    //    required | alfa   max:80|required  | beta 
           'descripcion' =>'max:80|required',   
           'clasificacion_id' =>'required',   
           'unidad_id' =>'required',    //    required | alfa  
           'impuesto' =>'required',    //    required | alfa   max:12,0|required  | beta 
           'precio_venta' =>'max:12,0|required',     //    // required // |   // max:1|required // | 
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
        'codigo.required' => 'Debe introducir Codigo',
        'codigo.max' => 'Codigo no puede exceder 15 de longitud',
        'descripcion.required' => 'Debe introducir Descripcion',
        'descripcion.max' => 'Descripcion no puede exceder 80 de longitud',
        'clasificacion_id.required' => 'Debe introducir Clasificacion',
        'unidad_id.required' => 'Debe introducir Unidad',
        'impuesto.required' => 'Debe introducir Impuesto',
        'precio_venta.required' => 'Debe introducir Precio de Venta',
        'precio_venta.max' => 'Precio de Venta no puede exceder 12,0 de longitud',
        'estado.required' => 'Debe introducir Estado',
        'estado.max' => 'Estado no puede exceder 1 de longitud',
        ];
    }
}