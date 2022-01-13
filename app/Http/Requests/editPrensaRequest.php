<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editPrensaRequest extends FormRequest
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
            'titulo'        =>'sometimes|required|string',
            'subtitulo'     =>'sometimes|required|string',
            'descripcion'   =>'sometimes|required|string',
            'imagen'        =>'sometimes|required|image|mimes:jpeg,jpg,png,bmp',
            'link_kit'      =>'nullable|url',
            'fecha_publica' =>'sometimes|required',
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
