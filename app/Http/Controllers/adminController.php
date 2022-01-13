<?php

namespace App\Http\Controllers;

use File;
use Carbon\Carbon;
use App\Http\Controllers\crearContacto;
use App\Http\Requests\crearContactoRequest;
use App\Http\Requests\crearPrensaRequest;
use App\Http\Requests\faqRequest;
use App\Http\Requests\editContactoRequest;
use App\Http\Requests\editFaqRequest;
use App\Http\Requests\editPrensaRequest;
use App\contacto;
use App\convocatorias;
use App\Http\Requests\crearRolFormularioRequest;
use App\Http\Requests\crearUsuarioRequest;
use App\Http\Requests\editarRolFormularioRequest;
use App\Http\Requests\editUsuarioRequest;
use App\preguntasFrecuentes;
use App\prensa;
use App\registro;
use App\rol;
use App\rolesAsignados;
use App\User;
use App\actividades;
use App\categorias;
use App\Http\Requests\crearActividadRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class adminController extends Controller
{
    public function index()
    {

        if (auth()->user()->hasRoles([5])) {
            $registro = registro::find(auth()->user()->id_registro);
            $folio = $registro->folio;
            return redirect()->route('xix.show', $folio);
        }

        if (auth()->user()->hasRoles([1, 2, 3])) {
            return redirect()->route('admin.listaRegistros');
        }

        if (auth()->user()->hasRoles([4])) {
            return redirect()->route('admin.listaPrensa');
        }
    }
    public function random($longitud = 8)
    {
        $caracteres = 'abcdfghijklmnopqrstuvwxyz';
        return substr(str_shuffle($caracteres), 0, $longitud);
    }
    // Conjunto de funciones dedicadas a los contactos
    public function crearContacto()
    {

        return view('admin.crearContacto', [
            'contacto' => new contacto,
        ]);
    }
    public function guardarContacto(crearContactoRequest $request)
    {
        $contacto = new contacto;
        $contacto->fill($request->all());
        // Generar el slug
        $nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        $random = $this->random();
        $slug = $random . $nom_sin_esp;
        $contacto->slug = $slug;
        // guardar, mostrar error en pantalla en caso de haber uno
        $contacto->save();
        $request->session()->regenerate();

        return redirect()->route('admin.listaContactos');
    }
    public function editarContacto(contacto $contacto)
    {
        return view('admin.editarContacto', [
            'contacto' => $contacto,
        ]);
    }
    public function actualizarContacto(contacto $contacto, editContactoRequest $request)
    {
        $validated = $request->validated();
        $contacto->update($validated);
        // Generar el slug
        $nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        $random = $this->random();
        $slug = $random . $nom_sin_esp;
        $contacto->slug = $slug;
        $contacto->update(['slug']);
        return redirect()->route('admin.listaContactos');
    }
    public function listaContactos()
    {
        $contactos = contacto::paginate(10);
        return view('admin.listaContactos', [
            'contacto' => $contactos,
        ]);
    }
    public function deshabilitarContacto(contacto $contacto)
    {
        $contacto->status = 0;
        $contacto->update(['status']);
        return redirect()->route('admin.listaContactos');
    }
    public function habilitarContacto(contacto $contacto)
    {
        $contacto->status = 1;
        $contacto->update(['status']);
        return redirect()->route('admin.listaContactos');
    }
    // Conjunto de funciones dedicadas a administrar los registros
    public function listaRegistros()
    {
        $registro = registro::select(
            "registro.*",
            "categorias.id as categoriaId",
            "categorias.catNombre",
            "tipoPostulacion.id as tipoPostulacionId",
            "tipoPostulacion.campo",
            "nacionalidad.id as nacionalidadId",
            "nacionalidad.gentilicio_nac",
            "disciplinas.id as disciplinasId",
            "disciplinas.disciplina"
        )
            ->join("categorias", "categorias.id", "=", "registro.categorias")
            ->join("tipoPostulacion", "tipoPostulacion.id", "=", "registro.tipoPostulacion")
            ->join("nacionalidad", "nacionalidad.id", "=", "registro.id_nacionalidad")
            ->join("disciplinas", "disciplinas.id", "=", "registro.disciplina")
            ->orderBy('id', 'ASC')
            /*->join("jobs",function($join){
            $join->on("jobs.user_id","=","users.id")
                ->on("jobs.item_id","=","items.id");
        })*/
            ->paginate(2000);

        //$registro = registro::paginate(20);
        //dd($registro);

        return view('admin.listadoRegistro')->with('registros', $registro);
    }

    public function verificarRegistro(registro $registro)
    {
        $registro->verificacion = 1;
        $registro->update(['verificacion']);
        return redirect()->route('admin.listaRegistros');
    }

    public function noAceptadoRegistro(registro $registro, request $request)
    {
        $registro = registro::findorfail($registro->id);
        $registro->verificacion = 2;
        $registro->motivo = $request->motivo;
        $registro->otro_motivo = $request->otro_motivo;
        $registro->update(['verificacion','motivo','otro_motivo']);
        return redirect()->route('admin.listaRegistros');
    }

    public function listaVerificados()
    {
        //$registros = registro::where('verificacion', '=', 1)->paginate(20);
        $registros = registro::select(
            "registro.*",
            "categorias.id as categoriaId",
            "categorias.catNombre",
            "tipoPostulacion.id as tipoPostulacionId",
            "tipoPostulacion.campo",
            "nacionalidad.id as nacionalidadId",
            "nacionalidad.gentilicio_nac",
            "disciplinas.id as disciplinasId",
            "disciplinas.disciplina"
        )
            ->join("categorias", "categorias.id", "=", "registro.categorias")
            ->join("tipoPostulacion", "tipoPostulacion.id", "=", "registro.tipoPostulacion")
            ->join("nacionalidad", "nacionalidad.id", "=", "registro.id_nacionalidad")
            ->join("disciplinas", "disciplinas.id", "=", "registro.disciplina")
            ->where('verificacion', '=', 1)
            ->orderBy('id', 'ASC')
            ->paginate(2000);
        return view('admin.verificados', [
            'registros' => $registros,
        ]);
    }
    //Conjunto de funciones dedicadas a administrar las preguntas frecuentes (faq)->[Frecuent Asked Questions]
    public function crearfaq()
    {
        $convocatorias = convocatorias::where('status', '=', 1)->get();
        // dd($convocatorias);
        return view('admin.crearfaq', [
            'preguntasFrecuentes' => new preguntasFrecuentes,
            'convocatorias' => $convocatorias,
        ]);
    }
    public function guardarfaq(faqRequest $request)
    {
        $preguntasFrecuentes = new preguntasFrecuentes;
        $preguntasFrecuentes->fill($request->all());
        $pregunta = str_replace(' ', '-', $request->pregunta);
        $random = $this->random();
        $slug = $random . $pregunta; // Generar el slug
        $preguntasFrecuentes->slug = $slug;
        try {
            $preguntasFrecuentes->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listafaq');
    }
    public function listafaq()
    {
        $faq = preguntasFrecuentes::paginate(15);
        return view('admin.listafaq')->with('faq', $faq);
    }
    public function editarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $convocatorias = convocatorias::where('status', '=', 1)->get();
        return view('admin.editarFaq', [
            'preguntasFrecuentes' => $preguntasFrecuentes,
            'convocatorias' => $convocatorias,
        ]);
    }
    public function actualizarFaq(preguntasFrecuentes $preguntasFrecuentes, editFaqRequest $request)
    {
        $validated = $request->validated();
        $preguntasFrecuentes->update($validated);
        $pregunta = str_replace(' ', '-', $request->pregunta);
        $random = $this->random();
        $slug = $random . $pregunta; // Generar el slug
        $preguntasFrecuentes->update(['slug']);
        return redirect()->route('admin.listafaq');
    }
    public function deshabilitarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $preguntasFrecuentes->status = 0;
        $preguntasFrecuentes->update(['status']);
        return redirect()->route('admin.listafaq');
    }

    public function habilitarFaq(preguntasFrecuentes $preguntasFrecuentes)
    {
        $preguntasFrecuentes->status = 1;
        $preguntasFrecuentes->update(['status']);
        return redirect()->route('admin.listafaq');
    }
    //Conjunto de funciones dedicadas a administrar las el apartado de prensa
    public function crearPrensa()
    {
        $prensa = new prensa;
        $fechaConT = str_replace(' ', 'T', Carbon::now());

        $prensa->fecha_publica = $fechaConT;

        return view('admin.crearPrensa', [
            'prensa' => $prensa,

        ]);
    }
    public function guardarPrensa(crearPrensaRequest $request)
    {
        $prensa = new prensa;
        $prensa->fill($request->all());
        $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $prensa->slug = $slug;

        $fecha = $request->fecha_publica;
        $prensa->fecha_publica = str_replace('T', ' ', $fecha);
        $extension = $request->imagen->getclientoriginalextension();
        $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
        $path = '/public/prensas';
        $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
        $prensa->imagen = $nombreImagen;
        $id = Auth::id();
        $prensa->usuarios_id = $id;
        try {
            $prensa->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listaPrensa');
    }
    public function listaPrensa()
    {
        $prensa = prensa::paginate(15);
        foreach ($prensa as $p) {
            $p->fecha_publica = str_replace('T', ' ', $p->fecha_publica);
        }
        return view('admin.listaPrensa', [
            'prensa' => $prensa,
        ]);
    }
    public function editarPrensa(prensa $prensa)
    {

        $prensa = prensa::findorfail($prensa->id);
        $id = $prensa->usuarios_id;
        $usuario = User::find($id);
        $nombre = $usuario->name;

        $fecha = $prensa->fecha_publica;
        $prensa->fecha_publica = str_replace(' ', 'T', $fecha);
        return view('admin.editarPrensa', [
            'prensa' => $prensa,
            'nombre' => $nombre,

        ]);
    }
    public function actualizarPrensa(prensa $prensa, editPrensaRequest $request)
    {
        $prensa = prensa::findorfail($prensa->id);
        $req = $request->except(['imagen']);
        $prensa->update($req);
        if ($request->hasFile('imagen')) {
            File::delete('public/storage/prensas/' . $prensa->imagen);
            $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
            $random = $this->random();
            $extension = $request->imagen->getclientoriginalextension();
            $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
            $path = '/public/prensas';
            $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
            $prensa->imagen = $nombreImagen;
            $prensa->update(['imagen']);
        }
        $tituloSinEspacios = str_replace(' ', '-', $prensa->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $prensa->slug = $slug;
        $prensa->update(['slug']);
        $fecha = $request->fecha_publica;
        $prensa->fecha_publica = str_replace('T', ' ', $fecha);
        $prensa->update(['fecha_publica']);
        $id = Auth::id();
        $prensa->usuarios_id = $id;
        $prensa->update(['usuarios_id']);

        return redirect()->route('admin.listaPrensa');
    }
    public function deshabilitarPrensa(prensa $prensa)
    {
        $prensa->status = 0;
        $prensa->update(['status']);
        return redirect()->route('admin.listaPrensa');
    }

    public function habilitarPrensa(prensa $prensa)
    {
        $prensa->status = 1;
        $prensa->update(['status']);
        return redirect()->route('admin.listaPrensa');
    }

    public function listarRoles()
    {
        $roles = rol::paginate(10);
        return view('admin.listarRoles', [
            'roles' => $roles,
        ]);
    }

    public function crearRol()
    {
        return view('admin.crearRol', [
            'rol' => new rol,
        ]);
    }

    public function guardarRol(crearRolFormularioRequest $request)
    {
        $roles = new rol;
        $roles->fill($request->all());
        //dd($request->all());
        $roles->rol = $request->rol;
        $roles->descripcion = $request->descripcion;

        try {
            $roles->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.listarRoles');
    }

    public function editarRol(rol $roles)
    {

        return view('admin.editarRol', [
            'rol' => $roles,
        ]);
    }

    public function actualizarRol(rol $roles, editarRolFormularioRequest $request)
    {

        $validated = $request->validated();
        $roles->where('id', '=', $roles->id)->update($validated);
        return redirect()->route('admin.listarRoles');
    }

    public function deshabilitarRol(rol $roles)
    {
        $roles->status = 0;
        $roles->update(['status']);
        return redirect()->route('admin.listarRoles');
    }

    public function habilitarRol(rol $roles)
    {
        $roles->status = 1;
        $roles->update(['status']);
        return redirect()->route('admin.listarRoles');
    }

    public function listarUsuarios()
    {
        $usuarios = User::paginate(10);
        return view('admin.listaUsuarios', [
            'usuarios' => $usuarios,
        ]);
    }

    public function CrearUsuario()
    {
        $roles = rol::where('status', '=', 1)->get();
        return view('admin.crearUsuario', [
            'usuario' => new User,
            'roles' => $roles,
        ]);
    }
    /**
     * guardarUsuario
     *
     * @param crearUsuarioRequest $request
     * @return void
     */
    public function guardarUsuario(crearUsuarioRequest $request)
    {

        $usuario = new User;
        $rolesAsignados = new rolesAsignados;
        $usuario->fill($request->except('roles'));
        $usuario->username = $usuario->name;
        $usuario->password = bcrypt($usuario->password);
        $rolesAsignados->fill($request->except('name', 'email', 'password', 'password_confirmation'));

        // Generar el slug
        //$nom_sin_esp = str_replace(' ', '-', $request->nombre);
        // $resultado =preg_replace("/[^0-9]/", "", $nom_sin_esp);
        //$random=$this->random();
        //$slug =$random.$nom_sin_esp;
        //$contacto->slug=$slug;
        // guardar, mostrar error en pantalla en caso de haber uno

        try {
            $usuario->save();
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }

        $usuarioId = $usuario->id;
        $rolesAsignados->id_usuario = $usuarioId;
        for ($i = 0; $i < count($request->roles); $i++) {
            $rolesx[] = [
                'id_usuario' => $usuarioId,
                'id_rol' => $request->roles[$i]
            ];
        }
        try {
            rolesAsignados::insert($rolesx);
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
        }
        $request->session()->regenerate();

        return redirect()->route('admin.listarUsuarios');
    }

    public function editarUsuario($id)
    {
        $usuarios = User::findorfail($id);
        //dd($usuarios->roles->id);
        $roles = rol::where('status', 1)->get();


        return view('admin.editarUsuario', [
            'usuario' => $usuarios,
            'roles' => $roles,
        ]);
    }

    public function actualizarUsuario($id, editUsuarioRequest $request)
    {

        $user = User::findorfail($id);
        if ($request->password == null) {
            $req = $request->except(['roles', 'password']);
        } else {
            $req = $request->except(['roles', 'password']);
            $user->password = bcrypt($request->password);
        }


        $user->update($req);
        if ($request->roles) {
            $rolesAsignados = rolesAsignados::where('id_usuario', '=', $id);
            $rolesAsignados->delete();
            for ($i = 0; $i < count($request->roles); $i++) {
                $rolesx[] = [
                    'id_usuario' => $id,
                    'id_rol' => $request->roles[$i]
                ];
            }
            try {
                rolesAsignados::insert($rolesx);
            } catch (\Illuminate\Database\QueryException $e) {
                dd($e);
            }
        }
        $request->session()->regenerate();
        return redirect()->route('admin.listarUsuarios');
    }

    public function listarActividades()
    {
        $actividades = actividades::paginate(10);
        return view('admin.listaActividades', [
            'actividades' => $actividades,
        ]);
    }

    //Conjunto de funciones dedicadas a administrar las el apartado de actividades
    public function crearActividad()
    {
        return view('admin.crearActividad', [
            'actividades' => new actividades,
        ]);
    }
    public function guardarActividad(crearActividadRequest $request)
    {
        $actividades = new actividades;
        $actividades->fill($request->all());
        $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $actividades->slug = $slug;

        $fecha = $request->fecha_hora;
        $actividades->fecha_hora = str_replace('T', ' ', $fecha);
        $extension = $request->imagen->getclientoriginalextension();
        $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
        $path = '/public/actividades';
        $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
        $actividades->imagen = $nombreImagen;
        $id = Auth::id();
        $actividades->usuarios_id = $id;
        try {
            $actividades->save();
            $request->session()->regenerate();
        } catch (\Illuminate\Database\QueryException $e) {
            ddd($e);
        }
        return redirect()->route('admin.listarActividades');
    }

    public function editarActividad(actividades $actividades)
    {

        $actividades = actividades::findorfail($actividades->id);
        $id = $actividades->usuarios_id;
        $usuario = User::find($id);
        $nombre = $usuario->name;

        $fecha = $actividades->fecha_hora;
        $actividades->fecha_hora = str_replace(' ', 'T', $fecha);
        return view('admin.editarActividad', [
            'actividades' => $actividades,
            'nombre' => $nombre,

        ]);
    }
    public function actualizarActividad(actividades $actividades, editPrensaRequest $request)
    {
        $actividades = actividades::findorfail($actividades->id);
        $req = $request->except(['imagen']);
        $actividades->update($req);
        if ($request->hasFile('imagen')) {
            File::delete('public/storage/actividades/' . $actividades->imagen);
            $tituloSinEspacios = str_replace(' ', '-', $request->titulo);
            $random = $this->random();
            $extension = $request->imagen->getclientoriginalextension();
            $nombreImagen = $tituloSinEspacios . $random . '.' . $extension;
            $path = '/public/prensas';
            $imagen = $request->file('imagen')->storeAS($path, $nombreImagen);
            $actividades->imagen = $nombreImagen;
            $actividades->update(['imagen']);
        }
        $tituloSinEspacios = str_replace(' ', '-', $actividades->titulo);
        $random = $this->random();
        $slug = $random . $tituloSinEspacios;
        $actividades->slug = $slug;
        $actividades->update(['slug']);
        $fecha = $request->fecha_hora;
        $actividades->fecha_hora = str_replace('T', ' ', $fecha);
        $actividades->update(['fecha_hora']);
        $id = Auth::id();
        $actividades->usuarios_id = $id;
        $actividades->update(['usuarios_id']);

        return redirect()->route('admin.listarActividades');
    }
    public function deshabilitarActividad(actividades $actividades)
    {
        $actividades->status = 0;
        $actividades->update(['status']);
        return redirect()->route('admin.listarActividades');
    }

    public function habilitarActividad(actividades $actividades)
    {
        $actividades->status = 1;
        $actividades->update(['status']);
        return redirect()->route('admin.listarActividades');
    }
}
