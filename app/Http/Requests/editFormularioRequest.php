<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editFormularioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        
        return [
                'tipoPostulacion'           =>      'sometimes|required|numeric',
                'categorias'                =>      'sometimes|required|numeric',
                'nombre'                    =>      'sometimes|required|string',
                'apellidoPaterno'           =>      'sometimes|required|string',
                'apellidoMaterno'           =>      'nullable|string',
                'nombreColectivo'           =>      'sometimes|required_if:tipoPostulacion,2',
                'fechaNacimiento'           =>      'sometimes|required|date|before:2004-01-01',
                'id_nacionalidad'           =>      'sometimes|required',
                'lugarResidencia'           =>      'sometimes|required|string',
                'email'                     =>      'sometimes|required|email',
                'emailConfirmacion'         =>      'sometimes|required|email|same:email',
                'telefono'                  =>      'sometimes|required|numeric',
                'extension'                  =>     'nullable|numeric',
                'semblanza'                 =>      'sometimes|required|string',
                'documentosPersonales'      =>      'sometimes|required|file|max:2048|mimes:pdf',
                'disciplina'                =>      'sometimes|required|numeric',
                'tituloProyecto'            =>      'sometimes|required|string',
                'anoRealizacion'            =>      'sometimes|required|numeric|max:'.date('Y'),
                'descripcionProyecto'       =>      'sometimes|required|string',
                'adjuntarProyecto'          =>      'sometimes|required|file|max:15360|mimes:pdf',
                'integrantes'                =>     'sometimes|required_if:tipoPostulacion,2',
                'privacidad'                =>      'sometimes|required',
                'bases'                     =>      'sometimes|required',
        ];
    }
    public function attributes()
    {
        return [
            'tipoPostulacion'               =>      'tipo de postulación',
//'categorias'                    =>      'categorias',
            // 'folio'               =>      'folio',

            'nombre'                        =>      'nombre',
            'apellidoPaterno'               =>      'apellido paterno',
            'apellidoMaterno'               =>      'apellido materno',
            // 'nombreColectivo'               =>      'nombre dColectivo',
            'fechaNacimiento'               =>      'fecha de nacimiento',
            'id_nacionalidad'               =>      'nacionalidad',
            'lugarResidencia'               =>      'lugar de residencia',
            'email'                         =>      'correo electrónico',
            'emailConfirmacion'             =>      'confirmación del correo electrónico',
            'telefono'                      =>      'número telefónico',
            'semblanza'                     =>      'semblanza',
            'documentosPersonales'          =>      'Los documentos personales',
            'disciplina'                    =>      'disciplina',
            'tituloProyecto'                =>      'título de la obra',
            'anoRealizacion'                =>      'año de realización',
            'descripcionProyecto'           =>      'sinopsis de la propuesta',
            'adjuntarProyecto'              =>      'propuesta',
            // 'integrante'                    =>      'El nombre completo del integrante',
            'privacidad'                    =>      'Aceptar el aviso de privacidad',
            'bases'                         =>      'Aceptar las bases, términos y condiciones',
        ];
    }
}
