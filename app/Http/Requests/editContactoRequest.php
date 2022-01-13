<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editContactoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'=>'sometimes|required|string',
            'email' =>'nullable|email',
            'telefono1'=>'nullable|numeric',
            'horario'=>'sometimes|required|string',
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=>'nombre o nombre del área',
            'email'=>'correo electrónico',
            'decripcion'=>'descripción',
            'telefono1'=>'teléfono de contacto 1',
            'horario'=>'horario de atención', 
        ]; 
    }
}
 