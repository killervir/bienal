<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // Autoriza el acceso al form request. Si retorna "false" devolverá un error del tipo forbidden.
    public function authorize()
    {
        return true;
    }
    // Esta función és la que se encarga de validar cada campo.
    public function rules()
    {
        return [
            'tipoPostulacion'           =>      'required|numeric',
            'categorias'           =>      'required|numeric',
            'nombre'                    =>      'required|string',
            'apellidoPaterno'           =>      'required|string',
            'apellidoMaterno'           =>      'nullable|string',
            // 'apellidoMaterno'           =>      'required|string',
            'nombreColectivo'           =>      'required_if:tipoPostulacion,2',
            'fechaNacimiento'           =>      'required|date|before:2005-12-31|after:1920-01-01',
            'id_nacionalidad'           =>      'required',
            'lugarResidencia'           =>      'required|string',
            'email'                     =>      'required|email',
            //'email'                     =>      'required|email|unique:registro',
            'emailConfirmacion'         =>      'required|email|same:email',
            'telefono'                  =>      'required|numeric',
            'semblanza'                 =>      'required|string',
            'documentosPersonales'      =>      'required|file|max:2048|mimes:pdf',
            'disciplina'                =>      'required|numeric',
            'tituloProyecto'            =>      'required|string',
            'anoRealizacion'            =>      'required|numeric|max:'.date('Y'),
            'descripcionProyecto'       =>      'required|string',
            'adjuntarProyecto'          =>      'required|file|max:15360|mimes:pdf',
            'integrantes'               =>      'required_if:tipoPostulacion,2',
            'privacidad'                =>      'required',
            'bases'                     =>      'required',
        ];
    }
    // Esta función es la encargada de enviar los mensajes de error.
    public function messages()
    {
        return [
            // Mensajes de campos obligatorios.
            'tipoPostulacion.required'      => ':attribute es un campo obligatorio.',
            'categorias.required'      => ':attribute es un campo obligatorio.',
            'nombre.required'               =>  ':attribute es un campo obligatorio.',
            'apellidoPaterno.required'      =>  ':attribute es un campo obligatorio.',
            // 'apellidoMaterno.required'      =>  ':attribute es un campo obligatorio.',
            'nombreColectivo.required_if'   =>  ':attribute es un campo obligatorio.',
            'fechaNacimiento.required'      =>  ':attribute es un campo obligatorio.',
            'id_nacionalidad.required'      =>  ':attribute es un campo obligatorio.',
            'lugarResidencia.required'      =>  ':attribute es un campo obligatorio.',
            'email.required'                =>  ':attribute es un campo obligatorio.',
            'emailConfirmacion.required'    =>  ':attribute es un campo obligatorio.',
            //'email.unique'                  => 'Este correo ya fue registrado.',
            'telefono.required'             =>  ':attribute es un campo obligatorio.',
            'semblanza.required'            =>  ':attribute es un campo obligatorio.',
            'documentosPersonales.required' =>  ':attribute son un campo obligatorio.',
            'disciplina.required'           =>  ':attribute es un campo obligatorio.',
            'tituloProyecto.required'       =>  ':attribute es un campo obligatorio.',
            'anoRealizacion.required'       =>  ':attribute es un campo obligatorio.',
            'descripcionProyecto.required'  =>  ':attribute es un campo obligatorio.',
            'adjuntarProyecto.required'     =>  ':attribute es un campo obligatorio.',
            'integrantes.required_if'        =>  ':attribute es un campo obligatorio.',
            'folio.required'        =>  ':attribute es un campo obligatorio.',
            'privacidad.required'           =>  ':attribute es obligatorio.',
            'bases.required'                =>  ':attribute es obligatorio.',
            // Mensajes cadenas.
            'nombre.string'               =>  ':attribute debe ser texto.',
            'apellidoPaterno.string'      =>  ':attribute debe ser texto.',
            'apellidoMaterno.string'      =>  ':attribute debe ser texto.',
            'lugarResidencia.string'      =>  ':attribute debe ser texto.',
            'semblanza.string'            =>  ':attribute debe ser texto.',
            'tituloProyecto.string'       =>  ':attribute debe ser texto.',
            'descripcionProyecto.string'  =>  ':attribute debe ser texto.',
            //Mensajes numéricos.
            'tipoPostulacion.numeric'   => ':attribute debe ser un número.',
            'telefono.numeric'          =>  ':attribute debe ser un número.',
            'anoRealizacion.numeric'    =>  ':attribute debe ser un número.',
            'disciplina.numeric'        =>  ':attribute debe un número.',
            'anoRealizacion.max'        =>  ':attribute debe ser menor que '.date('Y').'.',
            //Mensajes de emails
            'email.email'                =>  ':attribute debe ser un correo electrónico.',
            'emailConfirmacion.email'    =>  ':attribute debe ser un correo electrónico.',
            'emailConfirmacion.same'     =>  ':attribute debe ser igual al correo electrónico.',
            // Mensajes de archivos
            'documentosPersonales.file' =>  'Ha habido un error al subir :attribute.',
            'adjuntarProyecto.file'     =>  'Ha habido un error al subir :attribute.',
            'documentosPersonales.max'  =>  ':attribute deben tener un peso máximo de 2MB.',
            'adjuntarProyecto.max'      =>  ':attribute debe tener un peso máximo de 15MB.',
            'documentosPersonales.mimes' =>  ':attribute deben ser en formato PDF.',
            'adjuntarProyecto.mimes'     =>  ':attribute debe ser en formato PDF.',
            // Mensajes de fechas
            'fechaNacimiento.date'      =>  ':attribute debe ser una fecha válida.',
            'fechaNacimiento.before'     =>  'Para participar debes ser mayor de edad.',
        ];
    }
    // Esta función especifica cómo se llamarán los campos a la hora de enviar un mensaje de error, son invocados por la función "messages" como :attribute.
    public function attributes()
    {
        return [
            'tipoPostulacion'               =>      'El tipo de postulación',
            'categorias'               =>      'La categoría',
            // 'folio'               =>      'El folio',

            'nombre'                        =>      'El nombre',
            'apellidoPaterno'               =>      'El apellido paterno',
            'apellidoMaterno'               =>      'El apellido materno',
            // 'nombreColectivo'               =>      'El nombre del Colectivo',
            'fechaNacimiento'               =>      'La fecha de nacimiento',
            'id_nacionalidad'               =>      'La nacionalidad',
            'lugarResidencia'               =>      'El lugar de residencia',
            'email'                         =>      'El correo electrónico',
            'emailConfirmacion'             =>      'La confirmación del correo electrónico',
            'telefono'                      =>      'El número telefónico',
            'semblanza'                     =>      'La semblanza',
            'documentosPersonales'          =>      'Los documentos personales',
            'disciplina'                    =>      'La disciplina',
            'tituloProyecto'                =>      'El título de la obra',
            'anoRealizacion'                =>      'El año de realización',
            'descripcionProyecto'           =>      'Sinopsis de la propuesta',
            'adjuntarProyecto'              =>      'propuesta',
            // 'integrante'                    =>      'El nombre completo del integrante',
            'privacidad'                    =>      'Aceptar el aviso de privacidad',
            'bases'                         =>      'Aceptar las bases, términos y condiciones',
        ];
    }
}
