<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearRolFormularioRequest extends FormRequest
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
            'rol' => 'required|string|min:5',
            'descripcion' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
           	'rol'=>'rol o rol del usuario',
            'descripcion'=>'descripción',            
        ];
    }
}
