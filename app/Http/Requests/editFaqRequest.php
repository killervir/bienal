<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editFaqRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'pregunta'      =>      'sometimes|required|string',
            'respuesta'      =>     'sometimes|required|string',
            'convocatorias_id' =>   'sometimes|required|numeric',
        ];
    }
    public function attributes()
    {
        return [
            'pregunta' => 'pregunta',
            'respuesta' => 'respuesta',
            'convocatorias_id' => 'convocatoria',
        ];
    }
}
