@extends('admin.layout')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
     <a class="btn btn-outline-primary" href="{{route('admin.crearActividad')}}">Crear actividad</a> <br><br> 
    <div class="w-100"></div>
    <table  id="listaActividades" class="table">
  <thead>
    <th>Título</th>
    <th>Fecha</th> 
    <th>Acciones</th>
  </thead>
  <tbody>
    @foreach($actividades as $a)
    <tr>
      <td>{{$a->titulo}}</td>
      <td>{{$a->fecha_hora}}</td>
       <td>
        <a data-toggle="tooltip" data-placement="top" title="Ver" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$a->id}}"></i></a>
        <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarActividad',$a->slug)}}"><i class="fas fa-pencil-alt"></i></a>
        @if($a->status==1) 
        <a data-toggle="tooltip" data-placement="top" title="Deshabilitar" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$a->slug}}"></i></a>
        @elseif($a->status==0)
        <a data-toggle="tooltip" data-placement="top" title="Habilitar" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$a->slug}}"></i></a>
        @endif
      </td> 
</tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

<!-- Modal  ver -->
 @foreach($actividades as $a)
<div class="modal fade ver-contacto" id="{{'ver'.$a->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$a->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <p>Titulo: <br><span>{{$a->titulo}}</span> </p>
                    <p>Resumen: <br><span>{{$a->resumen}}</span></p>
                </div>
                <div class="col-md-6 mb-2">
                    <p>Fecha y hora de la actividad: <br><span>{{$a->fecha_hora}}</span></p>
                    <a href="{{$a->link_facebook}}" target="_blank"><i class="fas fa-cloud-download-alt"></i> Facebook de la actividad</a>
                </div>
                <div class="col-md-6">   
                    <p>Imagen: </p>
                    <img  src="{{asset('public/storage/actividades/'.$a->imagen)}}"> <br>
                    
                </div>
            </div>
      </div>
      <div class="modal-footer">
      <a href="{{route('admin.editarActividad',$a->slug)}}" class="btn btn-outline-danger" >Editar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach 
{{-- Termina modal ver --}}
<!-- Modal  deshabilitar -->
 @foreach($actividades as $a)
<div class="modal fade" id="{{'deshabilitar'.$a->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$a->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($actividades, ['method' => 'PATCH', 'route' => ['admin.deshabilitarActividad', $a->slug]]) !!}
          <h5> ¿Está seguro que desea deshabilitar la actividad {{'"'.$a->titulo.'"'}}</h5>
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
 @foreach($actividades as $a)
<div class="modal fade" id="{{'habilitar'.$a->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$a->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($actividades, ['method' => 'PATCH', 'route' => ['admin.habilitarActividad', $a->slug]]) !!}        
          <h5> ¿Está seguro que desea habilitar la prensa {{'"'.$a->titulo.'"'}}</h5>
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