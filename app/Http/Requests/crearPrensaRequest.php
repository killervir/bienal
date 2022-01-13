<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class crearPrensaRequest extends FormRequest
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
            'titulo'        =>'required|string',
            'subtitulo'     =>'required|string',
            'descripcion'   =>'required|string',
            'imagen'        =>'required|image|mimes:jpeg,jpg,png,bmp',
            'link_kit'      =>'nullable|string',
            'fecha_publica' =>'required',
        ];
    }
    public function attributes()
    {
        return[
            'titulo'        =>'título',
            'subtitulo'     =>'subtítulo',
            'descripcion'   =>'descripción',
            'imagen'        =>'imagen',
            'link_kit'      =>'hipervínculo al Kit de prensa',
            'fecha_publica' =>'fecha de publicación',
        ];
    }
}
