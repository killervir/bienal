<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editUsuarioRequest extends FormRequest
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

    public function rules()
    {
        return [
                'name'           =>      'required|string',
                'email'                    =>      'nullable|email',
                'password' => 'nullable|confirmed|min:8',                               
        ];
    }
    
    // Esta función especifica cómo se llamarán los campos a la hora de enviar un mensaje de error, son invocados por la función "messages" como :attribute.
    public function attributes()
    {
        return [
            'name'               =>      'El usuario',            
            'email'                         =>      'El correo electrónico',
            'password'          =>          'La contraseña',                        
        ];
    }
}
