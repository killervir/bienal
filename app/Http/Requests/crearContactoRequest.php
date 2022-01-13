<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearContactoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'            =>'required|string',
            'telefono1'         =>'required|numeric',
            'horario'           =>'required|string',
            'email'             =>'nullable|email',
            'descripcion'       =>'nullable|string',
            'telefono1'         =>'nullable|numeric',
            'extension1'        =>'nullable|numeric',
            'telefono2'         =>'nullable|numeric',
            'extension2'        =>'nullable|numeric',
            'horario'           =>'nullable|string',
            'direccion'         =>'nullable|string',
        ];
    }
    public function attributes()
    {
        return [
           	'nombre'=>'nombre o nombre del área',
            'email'=>'correo electrónico',
            'decripcion'=>'descripción',
            'telefono1'=>'teléfono de contacto principal',
            'telefono2'=>'teléfono de contacto secundario',
            'extension1'=> 'extensión del teléfono 1',
            'extension2'=> 'extensión del teléfono 2',
            'horario'=>'horario de atención',
            'direccion'=>'direccion',
        ];
    }
}
