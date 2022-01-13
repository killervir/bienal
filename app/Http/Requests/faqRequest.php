<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class faqRequest extends FormRequest
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
            'pregunta'      =>      'required|string',
            'respuesta'      =>      'required|string',
            'convocatorias_id' =>   'required|numeric',
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
