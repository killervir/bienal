@extends('admin.layout')
@section('content')
<div class="container col-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Listado de registros verificados</h2>
        </div>
        <table id="verificado" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha y hora de registro</th>
                    <th>Folio</th>
                    <th>Tipo postulación</th>
                    <th>Categoría</th>
                    <th>Datos Personales</th>
                    <th>Proyecto</th>
                    <th>Ficha de registro</th>
                    <th>Nombre Completo</th>
                    <th>Nombre artístico</th>
                    <th>Fecha de nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Lugar de residencia</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Semblanza</th>
                    <th>Disciplina</th>
                    <th>Título de la obra</th>
                    <th>Año de realización</th>
                    <th>Sinopsis de la propuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                <tr>
                    <td>{!! $registro->id !!}</td>
                    <td>{{$registro->created_at}}</td>
                    <td>{!! $registro->folio !!}</td>
                    <td>{!! $registro->campo !!}</td>
                    <td>{!! $registro->catNombre !!}</td>
                    <td><a href="{{asset('public/storage/'.$registro->documentosPersonales)}}" target="_blank">{{asset('public/storage/'.$registro->documentosPersonales)}}</a></td>
                    <td><a href="{!! asset('public/storage/'.$registro->adjuntarProyecto) !!}" target="_blank">{!! asset('public/storage/'.$registro->adjuntarProyecto) !!}</a></td>
                    <td class="acciones-btns">
                        <a data-toggle="tooltip" data-placement="top" title="Ver registro" class="" href="{{route('xix.show',$registro->folio)}}"><i class="fas fa-folder"></i></a>
                    </td>
                    <td>{{$registro->nombre}} {{$registro->apellidoPaterno}} {{$registro->apellidoMaterno}}</td>
                    <td>{{$registro->nombreArtistico}}</td>
                    <td>{{$registro->fechaNacimiento}}</td>
                    <td>{{$registro->gentilicio_nac}}</td>
                    <td>{{$registro->lugarResidencia}}</td>
                    <td>{{$registro->email}}</td>
                    <td>{{$registro->telefono}} @isset($registro->extension) extensión: {{$registro->extension}} @endisset</td>
                    <td>{{$registro->semblanza}}</td>
                    <td>{{$registro->disciplina}}</td>
                    <td>{{$registro->tituloProyecto}}</td>
                    <td>{{$registro->anoRealizacion}}</td>
                    <td>{{$registro->descripcionProyecto}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $registros->links()}}
    </div>
</div>
@stop