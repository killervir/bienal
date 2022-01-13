<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearActividadRequest extends FormRequest
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
            'titulo'        =>'required|string',
            'resumen'     =>'required|string',            
            'imagen'        =>'nullable|image|mimes:jpeg,jpg,png,bmp',
            'link_facebook'      =>'nullable|string',
            'fecha_hora' =>'required',
        ];
    }
    public function attributes()
    {
        return[
            'titulo'        =>'título',
            'resumen'     =>'resumen',            
            'imagen'        =>'imagen',
            'link_facebook'      =>'hipervínculo de facebook',
            'fecha_hora' =>'fecha hora de la actividad',
        ];
    }
}
