@extends('partials.layout')
@section('content')
@csrf
<form role="form" action="{{route('xix.update',$registro->folio)}}" method="post" enctype="multipart/form-data">
	@method('patch')
<title>Editar registro </title>

	<div class="row">
	<div class="col-md-12">
		<h1>Editar registro</h1>
		<p>*Estos campos son obligatorios</p>
		<br>
	</div> {{-- col --}}
	</div> {{-- row --}}
	<div class="col-md-12">
		<h1>folio de registro: {{$registro->folio}}</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if($registro->tipoPostulacion==1)
			<h2>Postulación {{'individual'}} </h2>
			<h3>Información de contacto</h3>
			@elseif($registro->tipoPostulacion==2)
			<h2>Postulación {{'colectiva'}} </h2>
			<h3>Información del representante</h3>
			@endif
		</div>
	</div>
	@include('partials.categoria')
	@include('partials.formularioGeneral')
	@if($registro->tipoPostulacion==2)
		<div class="col-md-12">
		<h3>Información del colectivo</h3>
		<br>@include('partials.rowColectiva')
		</div>
		<div class="col-md-6">
			<h4>Eliminar integrantes</h4>
			<table class="table">
				<thead>
					<tr>
						<th>Integrante</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
			@foreach($integrantes as $integrante)

					<tr>
						<td>{{$integrante->integrante}}</td>
						<td>
							<a data-toggle="tooltip" data-placement="top" title="Eliminar" class="c-verde" href="{{route('xix.cEliminarIntegrante',$integrante->id)}}"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
			@endforeach

				</tbody>
			</table>
		</div>
	@endif

	@include('partials.proyecto')
	
	@include('partials.condiciones')
	
	<div class="row">
		<div class="col-md-12 text-center mt-5 mb-3">
			<button type="submit" class="btn btn-outline-success">Actualizar</button>
			<br><br>
		</div>
	</div> {{-- row --}}

</form>
@endsection