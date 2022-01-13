<?php

namespace App\Http\Controllers;

use File;

use App\Http\Requests\formularioRequest;
//use App\Http\Requests\editFormularioRequest;
use App\Http\Requests\editFormularioRequest;
use App\User;
use App\disciplina;
use App\integrantes;
use App\nacionalidad;
use App\registro;
use App\rolesAsignados;
use App\tipoPostulacion;
use App\categorias;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\UrlGenerator;
use App\Mail\SendMailable;

//use Mail;
/**
 *  Clase registroController
 *
 */
class registroController extends Controller
{
    /**
     * Function index
     *
     * @return void
     */
    public function index()
    {
        //
    }
    public function generarFolio($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarOtroFolio($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarUsuarioTemporal($longitud = 4)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function generarContrasenia($longitud = 8)
    {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$%&';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    public function create() //Formulario de registro
    {
        if ((Carbon::now() > date('2021-02-11 10:30:00')) && (Carbon::now() < date('2021-04-08 23:59:59'))) {
            // Get the current URL without the query string...
            //echo url()->current();

            // Get the current URL including the query string...
            // echo url()->full();

            // Get the full URL for the previous request...
            //echo url()->previous();
            $tipoPostulacion = tipoPostulacion::where('status', '=', 1)->get();
            $categorias = categorias::where('status', '=', 1)->get();
            $nacionalidad = nacionalidad::where('status', '=', 1)->get();
            $disciplina = disciplina::where('status', '=', 1)->get();
            $folio = 1;
            return view('registro.formulario', [
                'registro' => new registro,
                'tipoPostulacion' => $tipoPostulacion,
                'categorias'=> $categorias,
                'nacionalidad' => $nacionalidad,
                'disciplina' => $disciplina,
                'seleccion' => 1,
                'folio' => $folio,
            ]);
        } else {
            abort(403,"El registro a la convocatoria concluyó el 8 de abril de 2021 a las 23:59 horas (horario de la Ciudad de México).");
        }
    }

    public function enviarCorreo(registro $registro)
    {
        $registro = $registro::where('id', '=', $registro->id)->get();
        foreach ($registro as $r) {
            $name = $r->nombre . ' ' . $r->apellidoPaterno . ' ' . $r->apellidoMaterno;
            $emailUsuario = $r->email;
            $folio = $r->folio;
        }



        $data = array('name' => $name, 'folio' => $folio);
        $template_path = 'emails.bienal';

        /* $mail = Mail::send(['html'=> $template_path ], $data, function($message) use($emailUsuario, $name) {
                $message->from($emailUsuario,'Bienal de fotografía');
                $message->to($emailUsuario, $name)->subject('Bienal de Fotografía');
            }); */
        try {
            $mail = Mail::to($emailUsuario)->send(new SendMailable($emailUsuario, $name, $folio));
        } catch (\Throwable $th) {
            throw $th;
        }

        if ($mail) {
            return view('bienal_web.registrado', [
                'folio' => $folio,
            ]);
        } else {
            echo 'Rechazo';
        }

        /*$mensaje = '<h1>Hola '.$name.'</h1>
					<p>Muchas gracias por haber registrado tu proyecto. Tu ficha de registro a la XIX Bienal de Fotografía se recibió de manera correcta.</p>
					<h2>Número de folio: '.$folio.'</h2>
					<p>Los resultados se publicarán en el sitio oficial de la Bienal así como en nuestras redes sociales: <a href="http://bienaldefotografia.com.mx">bienaldefotografia.com.mx</a></p>
					<h3>Centro de la Imagen</h3>
					XIX Bienal de Fotografía<br>
					bienaldefotografia@cultura.gob.mx<br>
					<a href="http://bienaldefotografia.cultura.gob.mx">bienaldefotografia.com.mx</a></p>
					<p>Plaza de la Ciudadela 2, Centro Histórico, C.P. 06040 Alcaldía Cuauhtémoc, Ciudad de México<br>
					<a href="https://centrodelaimagen.cultura.gob.mx/"> centrodelaimagen.cultura.gob.mx</a></p>';
		echo $mensaje; die;
        $mail = new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->CharSet = 'utf-8';
            $mail->SMTPAuth =true;
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Host = env('MAIL_HOST'); //gmail has host > smtp.gmail.com
            $mail->Port = env('MAIL_PORT'); //gmail has port > 587 . without double quotes
            $mail->Username = env('MAIL_USERNAME'); //your username. actually your email
            $mail->Password = env('MAIL_PASSWORD'); // your password. your mail password
            $mail->setFrom('bienaldefotografia@cultura.gob.mx', 'Bienal de fotografía');
            $mail->Subject = 'Bienal de Fotografía';//$request->subject;
            //$mail->MsgHTML($request->text);
            $mail->MsgHTML($mensaje);
            $mail->addAddress($emailUsuario , $name);
            $mail->addBCC('bienaldefotografia@cultura.gob.mx');
            $mail->send();
        }catch(phpmailerException $e){
            // dd($e);
        }catch(Exception $e){
            // dd($e);
        }
        if($mail){
            //echo "Exitosamente";
            return view('bienal_web.registrado',[
                'folio'=>$folio,
            ]);
            //return View("result")->with("result","success")->with("title","Success");
        }else{
            echo "Rechazo";
            //return View("result")->with("result","failed")->with("title","Failed");
        }*/
    }
    public function store(formularioRequest $request)
    {

        $registro = new registro;
        $registro->fill($request->except(['folio']));
        $generado = $this->generarFolio();
        $folio = 'BIE21' . $generado;
        $registro->folio = $folio;
        while (registro::where('folio', '=', $folio)->exists()) {
            $generado = $this->generarOtroFolio();
            $otro = 'BIE21' . $generado;
            $folio = $otro;
        }
        $registro->folio = $folio;

        //asignar formato Y-m-d a la fecha de nacimiento para el guardado
        //de la base de datos
        $fecha_nacimiento = Carbon::parse($registro->fechaNacimiento);
        $registro->fechaNacimiento = $fecha_nacimiento->format('Y-m-d');
        // Asignar id de convocatoria.
        $registro->id_convocatoria = 1;
        // Generar usuarioTemporal
        $adicional = $this->generarUsuarioTemporal();
        $usuarioTemporal = $folio . $adicional;
        $registro->usuarioTemporal = $usuarioTemporal;
        // Generar contraseña
        $contrasenia = $this->generarContrasenia();
        $registro->contrasenia = $contrasenia;
        //Generar el path para los archivos.
        $path = '/public/' . $folio;
        // Guardar "documentos personales."
        $docPerNombre = $folio . '_documentos_personales.pdf';
        $documentosPersonales = $request->file('documentosPersonales')->storeAS($path, $docPerNombre);
        $registro->documentosPersonales = $folio . '/' . $docPerNombre;
        $registro->verificacion = 0;
        // Guardar Proyecto
        $proyectoNombre = $folio . '_proyecto_adjunto.pdf';
        $adjuntarProyecto = $request->file('adjuntarProyecto')->storeAS($path, $proyectoNombre);
        $registro->adjuntarProyecto = $folio . '/' . $proyectoNombre;
        //Guardar
        try {
            $registro->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }
        $registroId = $registro->id;
        if ($registro->tipoPostulacion == 2) {
            foreach ($request->integrantes as $integrante) {
                $integranten = new integrantes;
                $integranten->id_registro = $registroId;
                $integranten->integrante = $integrante;
                $integranten->save();
            }
        }
        $usuario = new User;
        $usuario->username = $registro->usuarioTemporal;
        $usuario->name = $registro->usuarioTemporal;
        $usuario->password = bcrypt($contrasenia);
        $usuario->id_registro = $registroId;
        $usuario->save();
        // Asignarle el rolesAsignados

        $rolAsignado = new rolesAsignados;
        $rolAsignado->id_usuario = $usuario->id;
        $rolAsignado->id_rol = 5;
        $rolAsignado->save();

        $mensaje = 'Ha sido registrado con el folio' . $request->folio;

        $correo = $this->enviarcorreo($registro);


        $request->session()->regenerate();
        return redirect()->route('registrado', ['folio' => $folio]);
    }
    public function registrado($folio)
    {
        return view('bienal_web.registrado', [
            'folio' => $folio,
        ]);
    }

    public function show(registro $registro)
    {
        $integrantes = integrantes::where('id_registro', '=', $registro->id)->get();
        $nacionalidad = nacionalidad::find($registro->id_nacionalidad);
        $disciplina = disciplina::find($registro->disciplina);
        return view('registro.ver', [
            'registro' => $registro,
            'nacionalidad' => $nacionalidad,
            'disciplina' => $disciplina,
            'integrantes' => $integrantes,
        ]);
    }
    public function edit(registro $registro)
    {
        $integrantes = integrantes::where('id_registro', '=', $registro->id)->get();
        $nacionalidad = nacionalidad::where('status', '=', 1)->get();
        $disciplina = disciplina::where('status', '=', 1)->get();
        $categorias = categorias::where('status', '=', 1)->get();
        if (auth()->user()->hasRoles([5])) {
            return view('registro.edit', [
                'nacionalidad' => $nacionalidad,
                'disciplina' => $disciplina,
                'registro' => $registro,
                'integrantes' => $integrantes,
                'categorias' => $categorias,

            ]);
        } else {
            return abort(401, 'Usted no puede editar este registro');
        }
    }
    public function update(registro $registro, editFormularioRequest $request)
    {
        $fecha_nacimiento = Carbon::parse($request->fechaNacimiento);
        $request->fechaNacimiento = $fecha_nacimiento->format('Y-m-d');
        $req = $request->except(['documentosPersonales', 'adjuntarProyecto']);

        $registro->update($req);
        $folio = $registro->folio;
        $path = '/public/' . $folio;

        if ($request->hasFile('documentosPersonales')) {
            File::delete('public/storage/' . $folio . $registro->documentosPersonales);
            // Guardar "documentos personales."
            $docPerNombre = $folio . '_documentos_personales.pdf';
            $documentosPersonales = $request->file('documentosPersonales')->storeAS($path, $docPerNombre);
            $registro->documentosPersonales = $folio . '/' . $docPerNombre;
            $registro->update(['documentosPersonales']);
        }
        if ($request->hasFile('adjuntarProyecto')) {
            File::delete('public/storage/' . $folio . $registro->adjuntarProyecto);
            $proyectoNombre = $folio . '_proyecto_adjunto.pdf';
            $adjuntarProyecto = $request->file('adjuntarProyecto')->storeAS($path, $proyectoNombre);
            $registro->adjuntarProyecto = $folio . '/' . $proyectoNombre;
            $registro->update(['adjuntarProyecto']);
        }
        $registroId = $registro->id;
        if ($registro->tipoPostulacion == 2) {
            foreach ($request->integrantes as $integrante) {
                $integranten = new integrantes;
                $integranten->id_registro = $registroId;
                $integranten->integrante = $integrante;
                $integranten->save();
            }
        }
        return redirect()->route('xix.show', $folio);
    }
    public function cEliminarIntegrante($id)
    {
        $integrante = integrantes::find($id);
        return view('registro.cEliminarIntegrante', [
            'integrante' => $integrante,
        ]);
    }
    public function eliminarIntegrante($id)
    {
        $integrante = integrantes::find($id);
        $idRegistro = $integrante->id_registro;
        $registro = registro::find($idRegistro);
        $integrante->delete();
        return redirect()->route('xix.edit', $registro->folio);
    }
    public function destroy($id)
    {
        //
    }
}
