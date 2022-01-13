@extends('admin.layout')
@section('content')

<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Listado de registros</h2>
    </div>
    <div class="table-responsive">
      <table id="registro" class="table display responsive dt-responsive nowrap" style="width:100%">
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
            <th>Verificación</th>
            <th>Motivo de rechazo</th>
            <th>Otro</th>

          </tr>
        </thead>
        <tbody>

          @foreach($registros as $registro)

          <tr class="{{$registro->verificacion==1 ? 'registroAceptado' : ($registro->verificacion==2 ? 'registroRechazado':'registroPendiente')}}">
            <td>{!! $registro->id !!}</td>
            <td>{{$registro->created_at}}</td>
            <td>{!! $registro->folio !!}</td>
            <td>{!! $registro->campo !!}</td>
            <!--<td>{!! $registro->tipoPostulacion==1 ? 'Individual' : 'Colectiva' !!}</td>-->
            <!--<td>{!! $registro->categorias==1 ? 'Categoría A: Artista con trayectoria de hasta cinco años':'Categoría B: Artista con trayectoria mayor a cinco años' !!}</td>-->
            <td>{!! $registro->catNombre !!}</td>
            <td><a href="{{asset('public/storage/'.$registro->documentosPersonales)}}" target="_blank">{{asset('public/storage/'.$registro->documentosPersonales)}}</a></td>
            <td><a href="{!! asset('public/storage/'.$registro->adjuntarProyecto) !!}" target="_blank">{!! asset('public/storage/'.$registro->adjuntarProyecto) !!}</a></td>
            <td class="acciones-btns">
              <a data-placement="top" title="Ver registro" class="" href="{{route('xix.show',$registro->folio)}}"><i class="fas fa-folder"></i></a>
              @if(auth()->user()->hasRoles([5]))
              <a data-placement="top" title="Editar" class="" href="{{route('xix.edit',$registro->folio)}}"><i class="fas fa-pencil-alt"></i></a>
              @endif
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
            <td>
              @if($registro->verificacion==0)
              <!--<button class="btn btn-verificacion mr-3">Verificar</button>-->
              <a  data-toggle="modal" data-target="{{'#verificar'.$registro->folio}}" title="Verificar" class="btn btn-verificacion  ml-3 mr-3" href="#"><i class="fas fa-">Verificar</i></a>
              <a  data-toggle="modal" data-target="{{'#noAceptado'.$registro->folio}}" title="No aceptado" class="btn btn-verificacion" href="#"><i class="fas fa-"">No aceptado</i></a>
              @elseif($registro->verificacion==1)
              <font color="green"><i itle="Verificado" class="fas fa-check"></i>Aceptado</font>
              @elseif($registro->verificacion==2)
              <font color="red"><i title="No aceptado" class="fas fa-close"></i>No aceptado</font>
              @endif
            </td>
            <td>{{$registro->motivo}}</td>
            <td>{{$registro->otro_motivo}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- $registros->links() --}}
  </div>
</div>
<!-- Modal  verificar -->
@foreach($registros as $r)
<div class="modal fade" id="{{'verificar'.$r->folio}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="staticBackdropLabel"><strong>Folio:</strong> {{$r->folio}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($registro, ['method' => 'PATCH', 'route' => ['admin.verificarRegistro', $r->folio]]) !!}
        <p> ¿Está seguro que desea verificar el registro con el folio {{'"'.$r->folio.'"'}}</p>
        <div class="text-right mt-3">
          <button class="btn btn-success btn-generico">Sí, verificar</button>
          <button type="button" class="btn btn-secondary btn-generico" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="{{'noAceptado'.$r->folio}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="staticBackdropLabel"><strong>Folio:</strong> {{$r->folio}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {*!! Form::model($registro, ['method' => 'GET', 'route' => ['admin.noAceptadoRegistro', $r->folio]]) !!*}
        <p> ¿Está seguro que desea no aceptar el registro con el folio {{'"'.$r->folio.'"'}}</p>

        <div id="selectboxx" data-id="{{$r->folio}}">
        <label>Motivo:</label>
        <select class="form-control z" id="motivo" name="motivo" required>
          <option value="">-- Seleccione --</option>
          <option value="Documentación incompleta">Documentación incompleta</option>
          <option value="Inconsistencias en la información">Inconsistencias en la información</option>
          <option value="Otro">Otro</option>
        </select>
        </div>
        <div id="div_otro_motivo{{$r->folio}}" class="form-group mt-3" style="display:none">
        <label>Otro motivo:</label>
        <textarea class="form-control" name="otro_motivo" id="otro_motivo" placeholder="Describa porque motivo">
        </textarea>
        </div>
        <div class="text-right mt-3">
          <button class="btn btn-verificacion">No aceptado</button>
          <button type="button" class="btn btn-secondary btn-generico" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach
{{-- Termina modal de verificar --}}
@stop
