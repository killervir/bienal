<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearUsuarioRequest extends FormRequest
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
                'password' => 'required|min:8',  
                'password_confirmation'         =>      'required|same:password',              
        ];
    }
    // Esta función es la encargada de enviar los mensajes de error.
    public function messages()
    {
        return [
            // Mensajes de campos obligatorios.
            'name.required'      => ':attribute es un campo obligatorio.',
            'password.required'               =>  ':attribute es un campo obligatorio.',            
            //Mensajes de emails
            'email.email'                =>  ':attribute debe ser un correo electrónico.',            
            'password_confirmation.same'     =>  ':attribute debe ser igual a la contraseña.',            
        ];
    }
    // Esta función especifica cómo se llamarán los campos a la hora de enviar un mensaje de error, son invocados por la función "messages" como :attribute.
    public function attributes()
    {
        return [
            'name'               =>      'El usuario',            
            'email'                         =>      'El correo electrónico',
            'password'          =>          'La contraseña',
            'password_confirmation'             =>      'La confirmación de la contraseña',            
        ];
    }
}
