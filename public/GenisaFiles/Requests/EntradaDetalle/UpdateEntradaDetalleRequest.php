<?php

namespace App\Http\Requests\EntradaDetalle;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEntradaDetalleRequest extends FormRequest
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
        //            'item' =>'required',                   //            'entrada_id' =>'required',     
            'entrada_id' =>'required',                   
            'sector_id' =>'required',                   
            'producto_id' =>'required',            //    required | alfa   max:8,2|required  | beta 
            'cantidad' =>'max:8,2|required',               

        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    * @return  array
    */
    public function messages()
    {
        return [
            'item.required' => 'Debe introducir Item',
            'entrada_id.required' => 'Debe introducir Entrada',
            'sector_id.required' => 'Debe introducir Sector Id',
            'producto_id.required' => 'Debe introducir Producto Id',
            'cantidad.required' => 'Debe introducir Cantidad',
            'cantidad.max' => 'Cantidad no puede exceder 8,2 de longitud',
        ];
    }
}