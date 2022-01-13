@extends('admin.layout')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-outline-primary" href="{{route('admin.CrearUsuario')}}">Crear usuario</a> <br><br>
    <div class="w-100"></div>
    <table  id="listaUsuarios" class="table">
  <thead>
    <th>Usuario</th>
    <th>Correo electrónico</th>
    <th>Roles</th>
    <th>Acciones</th>
  </thead>
  <tbody>
      
    @foreach($usuarios as $u)
    <tr>
      <td>{{$u->username}}</td>
      <td>{{$u->email}}</td>
      <td>
          {{$u->roles->pluck('rol')->implode(', ')}}
     
      </td>
      <td>
        <a data-toggle="tooltip" data-placement="top" title="Ver usuario" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$u->id}}"></i></a>
        <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarUsuario',$u->id)}}"><i class="fas fa-pencil-alt"></i></a>
{{-- @if($c->status==1) 
        <a data-toggle="tooltip" data-placement="top" title="Deshabilitar contacto" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$c->slug}}"></i></a></td>
        @elseif($c->status==0)
        <a data-toggle="tooltip" data-placement="top" title="Habilitar contacto" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$c->slug}}"></i></a>
        @endif --}}
      </td>
    </tr>
  
    @endforeach
  </tbody>
</table>
{{ $usuarios->links()}}
  </div>
</div>

<!-- Modal  ver -->
 @foreach($usuarios as $u)
<div class="modal fade" id="{{'ver'.$u->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$u->username}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Usuario: {{$u->name}}<br />
    Correo electrónico: {{$u->email}}<br />
    Roles: {{$u->roles->pluck('rol')->implode(', ')}}		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach 
{{-- Termina modal de ver --}}
<!-- Modal  deshabilitar -->
{{-- @foreach($contacto as $c)
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
 --}}{{-- Termina modal de deshabilitar --}}
<!-- Modal  habilitar -->
{{-- @foreach($contacto as $c)
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
@endforeach --}} 
{{-- Termina modal de habilitar --}}
@stop