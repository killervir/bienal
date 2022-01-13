@extends('admin.layout')
@section('content')
<a class="btn btn-outline-primary" href="{{route('admin.crearfaq')}}">Crear Pregunta frecuente</a>
<br><br>
<div class="panel panel-default">
  <div class="panel-heading">
    <table class="table">
      <thead>
        <tr>
          <th>Convocatoria</th>
          <th>Pregunta</th>
          <th>Respuesta</th>
          <th>Acciones</th>
        </tr>
  </div>
  <div class="panel-body">
      <tbody>
        <tr>
        @foreach($faq as $f)
        <tr>
          <td>{{'Bienal 2020'}}</td>
          <td>{{$f->pregunta}}</td>
          <td>{{$f->respuesta}}</td>
          <td>
            <a data-toggle="tooltip" data-placement="top" title="Ver" class="" href="#"><i class="fas fa-folder" data-toggle="modal" data-target="{{'#ver'.$f->slug}}"></i></a>
            <a data-toggle="tooltip" data-placement="top" title="Editar" class="" href="{{route('admin.editarFaq',$f->slug)}}"><i class="fas fa-pencil-alt"></i></a>
            @if($f->status==1) 
            <a data-toggle="tooltip" data-placement="top" title="Deshabilitar" class="c-rojo" href="#"><i class="far fa-eye-slash" data-toggle="modal" data-target="{{'#deshabilitar'.$f->slug}}"></i></a></td>
            @elseif($f->status==0)
            <a data-toggle="tooltip" data-placement="top" title="Habilitar" class="c-verde" href="#"><i class="far fa-eye" data-toggle="modal" data-target="{{'#habilitar'.$f->slug}}"></i></a>
            @endif
        </tr>
        @endforeach
        </tr>
      </tbody>
      </thead>
    </table>
  </div>
</div>
<!-- Modal  ver -->
@foreach($faq as $f)
<div class="modal fade" id="{{'ver'.$f->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$f->pregunta}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Pregunta:</h3>  
        {{$f->pregunta}}    <br>  <br>  
        <h3>Respuesta:</h3> 
    {{$f->respuesta}} <br>      
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
@foreach($faq as $f)
<div class="modal fade" id="{{'deshabilitar'.$f->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$f->pregunta}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($faq, ['method' => 'PATCH', 'route' => ['admin.deshabilitarFaq', $f->slug]]) !!}
          <h5> ¿Está seguro que desea deshabilitar la pregunta {{'"'.$f->pregunta.'"'}}</h5>
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
@foreach($faq as $f)
<div class="modal fade" id="{{'habilitar'.$f->slug}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{$f->pregunta}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($faq, ['method' => 'PATCH', 'route' => ['admin.habilitarFaq', $f->slug]]) !!}        
          <h5> ¿Está seguro que desea habilitar la pregunta {{'"'.$f->pregunta.'"'}}</h5>
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