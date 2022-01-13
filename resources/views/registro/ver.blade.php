@extends('partials.layout')
@section('content')
<div class="ver-registro mb-5">
<div class="row">
<div class="col-12 text-right">
		<a class="btn btn-danger mt-4 mb-4" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" tabindex="-1" aria-disabled="true">Cerrar sesión</a>
		<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
     </div>
    <h1 class="col-md-4 offset-md-2">folio de registro: <br> <span> {{$registro->folio}}</span></h1>
    @if(auth()->user()->hasRoles([5]))
    <div class="col-md-4 mb-5">	
    	<a class="btn btn-outline-success" href="{{route('xix.edit',$registro->folio)}}" class="btn btn-outline-secondary">Editar</a>
    </div>
    
    @endif
    
    <div class="col-md-12 mt-4">
        @if($registro->tipoPostulacion==1)
        <h3>Tipo de postulación: <br><span>{{'Individual'}}</span> </h3>
        @elseif($registro->tipoPostulacion==2)
        <h3>Tipo de postulación: <br><span>{{'Colectiva'}}</span> </h3>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        @if($registro->categorias==1)
        <h3>Categoría: <br><span>{{'Categoría A: Artista con trayectoria de hasta cinco años'}}</span> </h3>
        @elseif($registro->categorias==2)
        <h3>Categoría: <br><span>{{'Categoría B: Artista con trayectoria mayor a cinco años'}}</span> </h3>
        @endif
    </div>
    
   
</div>

<div class="row">
    <div class="col-md-12">
        @if($registro->tipoPostulacion==1)
        <h2>Información de contacto</h2>
        @elseif($registro->tipoPostulacion==2)
        <h2>Información del representante</h2>
        @endif
    </div>

    <div class="col-md-6">
        <h3>Nombre completo: <br><span> {{$registro->nombre}} {{$registro->apellidoPaterno}} {{$registro->apellidoMaterno}}</span></h3>

        <h3>Nombre artístico: <br><span> {{$registro->nombreArtistico}} </span></h3>
        
        <h3>Fecha de nacimiento: <br><span>{{$registro->fechaNacimiento}} </h3></span>
        
        <h3>Nacionalidad: <br><span>{{$nacionalidad->gentilicio_nac}}</span> </h3>
    </div>
    <div class="col-md-6">
        <h3>Lugar de residencia:  <br><span>{{$registro->lugarResidencia}}</span> </h3>
        <h3>Correo electrónico:  <br><span>{{$registro->email}}</span> </h3>
        <h3>Teléfono:  <br><span>{{$registro->telefono}} @isset($registro->extension) extensión: {{$registro->extension}} @endisset</span></h3>
    
    </div>
    <div class="col-md-12 texto-largo">
        <h3>Semblanza:</h3>
        <p> {{$registro->semblanza}} </p>
    </div>
    <div class="col-md-6">
    	<h3>Documentos personales: <br><span><a href="{{asset('public/storage/'.$registro->documentosPersonales)}}" target="_blank"><i class="fas fa-file-pdf"></i> Ver PDF</a></span> </h3>
    </div>
</div>

@if($registro->tipoPostulacion==2)
<div class="row">
	<div class="col-md-12">
    	<h2>Sobre el colectivo</h2>
    </div>

    <div class="col-md-6">
        <h3>Nombre del colectivo: <br><span>{{$registro->nombreColectivo}}</span></h3>
    </div>
    <div class="col-md-6">
        <h3>Integrantes: </h3>
        <p> @foreach($integrantes as $i)
                {{$i->integrante}} <br>
            @endforeach</p>
    </div>
</div>
@endif

    <div class="row">
            <div class="col-md-12">
                <h2>Sobre la obra</h2>
            </div>
            <div class="col-md-6">
                <h3>Disciplina: <br><span>{{$disciplina->disciplina}}</h3>
                <h3>Título de la obra: <br><span>{{$registro->tituloProyecto}}</h3>
            </div>
            <div class="col-md-6">
                <h3>Año de realización: <br><span>{{$registro->anoRealizacion}}</h3>
                <h3>Propuesta adjunta: <br><span><a href="{!! asset('public/storage/'.$registro->adjuntarProyecto) !!}" target="_blank"><i class="fas fa-file-pdf"></i> Ver PDF</a></h3>
                
            </div>
            <div class="col-md-12 texto-largo">
                <h3>Sinopsis de la propuesta: </h3>
                <p>{{$registro->descripcionProyecto}}</p>
            </div>
    
    </div>
	
</div>

@stop