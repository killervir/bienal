@extends('admin.layout')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-outline-primary" href="{{route('admin.crearContacto')}}">Crear contacto</a> <br><br>
    <div class="w-100"></div>
    <table  id="listaContactos" class="table">
  <thead>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    @foreach($contacto as $c)
    <tr>
      <td>{{$c->nombre}}</td>
      <td>{{$c->descripcion}}</td>
      <td>
        <a data-toggle="tooltip" data-placement="top" title="Ver contacto" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$c->slug}}"></i></a>
        <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarContacto',$c->slug)}}"><i class="fas fa-pencil-alt"></i></a>
        @if($c->status==1) 
        <a data-toggle="tooltip" data-placement="top" title="Deshabilitar contacto" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$c->slug}}"></i></a></td>
        @elseif($c->status==0)
        <a data-toggle="tooltip" data-placement="top" title="Habilitar contacto" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$c->slug}}"></i></a>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

<!-- Modal  ver -->
@foreach($contacto as $c)
<div class="modal fade ver-contacto" id="{{'ver'.$c->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$c->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nombre:<br> <span>{{$c->nombre}}</span></p>
		@isset($c->email)
        <p>Correo: <br> <span>{{$c->email}}</span></p>
        @endisset
        @isset($c->descripcion)
		<p>Descripcion: <br> <span>{{$c->descripcion}}</span></p>
        @endisset
		<p>Telefono 1: <br> <span>{{$c->telefono1}}</span> @isset($c->extension1) Ext: <span>{{$c->extension1}}</span>@endisset</p>
        @isset($c->telefono2)
		<p>Telefono 2: <br> <span>{{$c->telefono2}}</span> @isset($c->extension1) Ext: <span>{{$c->extension2}}</span> @endisset </p>
        @endisset
        @isset($c->telefono2)
		<p>Horario: <br> <span>{{$c->horario}}</span></p>
        @endisset
		<p>Direccion: <br> <span>{{$c->direccion}}</span></p>
      </div>
      <div class="modal-footer">
        <a  class="btn btn-outline-danger" href="{{route('admin.editarContacto',$c->slug)}}">Editar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- Termina modal de ver --}}
<!-- Modal  deshabilitar -->
@foreach($contacto as $c)
<div class="modal fade" id="{{'deshabilitar'.$c->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$c->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($contacto, ['method' => 'PATCH', 'route' => ['admin.deshabilitarContacto', $c->slug]]) !!}
          <h5> ¿Está seguro que desea deshabilitar el contacto {{'"'.$c->nombre.'"'}}</h5>
          <button class="btn btn-outline-danger">Sí, deshabilitar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- Termina modal de deshabilitar --}}
<!-- Modal  habilitar -->
@foreach($contacto as $c)
<div class="modal fade" id="{{'habilitar'.$c->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$c->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($contacto, ['method' => 'PATCH', 'route' => ['admin.habilitarContacto', $c->slug]]) !!}        
          <h5> ¿Está seguro que desea habilitar el contacto {{'"'.$c->nombre.'"'}}</h5>
          <button class="btn btn-outline-success">Sí, habilitar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- Termina modal de habilitar --}}
@stop