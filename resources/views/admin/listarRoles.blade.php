@extends('admin.layout')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
     <a class="btn btn-outline-primary" href="{{route('admin.crearRol')}}">Crear rol</a> <br><br>
    <div class="w-100"></div>
    <table  id="listaRol" class="table">
  <thead>
    <th>Rol</th>
    <th>Descripción</th> 
    <th>Status</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    @foreach($roles as $r)
    <tr>
      <td>{{$r->rol}}</td>
      <td>{{$r->descripcion}}</td>
      <td>{{($r->status==1) ? 'Activo':'Inactivo'}}</td>
       <td>
         <a data-toggle="tooltip" data-placement="top" title="Ver" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$r->id}}"></i></a>
        <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarRol',$r->id)}}"><i class="fas fa-pencil-alt"></i></a>
        @if($r->status==1) 
        <a data-toggle="tooltip" data-placement="top" title="Deshabilitar" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$r->id}}"></i></a></td>
        @elseif($r->status==0)
        <a data-toggle="tooltip" data-placement="top" title="Habilitar" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$r->id}}"></i></a>
        @endif
</tr> 
    @endforeach
  </tbody>
</table>
  </div>
</div>

<!-- Modal  ver -->
 @foreach($roles as $r)
<div class="modal fade" id="{{'ver'.$r->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$r->rol}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Rol: {{$r->rol}}<br />
    		Descripción: {{$r->descripcion}} 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>
@endforeach 
{{-- Termina modal ver --}}
<!-- Modal  deshabilitar -->
 @foreach($roles as $r)
<div class="modal fade" id="{{'deshabilitar'.$r->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$r->rol}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($roles, ['method' => 'PATCH', 'route' => ['admin.deshabilitarRol', $r->id]]) !!}
          <h5> ¿Está seguro que desea deshabilitar el rol de {{'"'.$r->rol.'"'}}</h5>
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
 @foreach($roles as $r)
<div class="modal fade" id="{{'habilitar'.$r->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$r->rol}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($roles, ['method' => 'PATCH', 'route' => ['admin.habilitarRol', $r->id]]) !!}        
          <h5> ¿Está seguro que desea habilitar el rol de {{'"'.$r->rol.'"'}}</h5>
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