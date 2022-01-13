@extends('admin.layout')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-outline-primary" href="{{route('admin.crearPrensa')}}">Crear prensa</a> <br><br>
    <div class="w-100"></div>
    <table  id="listaContactos" class="table">
  <thead>
    <th>Título</th>
    <th>Fecha</th> 
    <th>Acciones</th>
  </thead>
  <tbody>
    @foreach($prensa as $p)
    <tr>
      <td>{{$p->titulo}}</td>
      <td>{{$p->fecha_publica}}</td>
      <td>
        <a data-toggle="tooltip" data-placement="top" title="Ver" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$p->id}}"></i></a>
        <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarPrensa',$p->slug)}}"><i class="fas fa-pencil-alt"></i></a>
        @if($p->status==1) 
        <a data-toggle="tooltip" data-placement="top" title="Deshabilitar" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$p->slug}}"></i></a></td>
        @elseif($p->status==0)
        <a data-toggle="tooltip" data-placement="top" title="Habilitar" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$p->slug}}"></i></a>
        @endif
</tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>

<!-- Modal  ver -->
@foreach($prensa as $p)
<div class="modal fade ver-contacto" id="{{'ver'.$p->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$p->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <p>Titulo: <br><span>{{$p->titulo}}</span> </p>
                    <p>Subitulo: <br><span>{{$p->subtitulo}}</span></p>
                </div>
                <div class="col-md-6 mb-2">
                    <p>Fecha: <br><span>{{$p->fecha_publica}}</span></p>
                    <a href="{{$p->link_kit}}" target="_blank"><i class="fas fa-cloud-download-alt"></i> Kit de prensa</a>
                </div>
                <div class="col-md-6">   
                    <p>Imagen: </p>
                    <img  src="{{asset('public/storage/prensas/'.$p->imagen)}}"> <br>
                    
                </div>
                
                <div class="col-12">
                	<p>Descripcion: <br><span>{{$p->descripcion}}</span></p>
                </div>
            </div>
      </div>
      <div class="modal-footer">
      <a href="{{route('admin.editarPrensa',$p->slug)}}" class="btn btn-outline-danger" >Editar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- Termina modal ver --}}
<!-- Modal  deshabilitar -->
@foreach($prensa as $p)
<div class="modal fade" id="{{'deshabilitar'.$p->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$p->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($prensa, ['method' => 'PATCH', 'route' => ['admin.deshabilitarPrensa', $p->slug]]) !!}
          <h5> ¿Está seguro que desea deshabilitar la prensa {{'"'.$p->titulo.'"'}}</h5>
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
@foreach($prensa as $p)
<div class="modal fade" id="{{'habilitar'.$p->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$p->titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($prensa, ['method' => 'PATCH', 'route' => ['admin.habilitarPrensa', $p->slug]]) !!}        
          <h5> ¿Está seguro que desea habilitar la prensa {{'"'.$p->titulo.'"'}}</h5>
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