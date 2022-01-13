@extends('partials.layout')
@section('content')
@csrf
<!-- Loader -->
<div class="loader" id="pageloader" style="display:none;">
		<div id="circleLoader"></div>
		<div class="textCircle">
			<h2>Su informacion se esta procesando, <br>espere un momento.</h2>
		</div>
	</div>
<!-- Loader -->
<form id="registroForm" role="form" action="{{route('xix.store')}}" method="post" enctype="multipart/form-data">
	<input id="tipo" name="tipo" type="hidden" value="{{old('tipo')}}">
<title>Ficha de registro </title>
<div class="container">
	<div class="row">
	<div class="col-md-12">
		<h1>Ficha de registro</h1>
		<p>*Estos campos son obligatorios</p>
		<br>
	</div> {{-- col --}}
	</div> {{-- row --}}
	@include('partials.postulacion')
	@include('partials.categoria')
    <input type="hidden" name="folio" id="folio" value="{{$folio}}">
    <div id="divIndividual" style="display:none"> <h2>Postulación individual</h2> </div>
    <div id="divColectivo" style="display:none"><h2>Postulación colectiva</h2></div>
    <div id="divRepresentante" style="display:none"><h3>Información del representante</h3></div>
    <div id="divFormulario" style="display:none">@include('partials.formularioGeneral')</div>
    <div id="divColectiva" style="display:none"><h3>Información del colectivo</h3>
    	<br>@include('partials.rowColectiva')
    </div>
	
	<hr>
		
		<div id="divProyecto" style="display:none">@include('partials.proyecto')</div>
	<div id="divCondiciones" style="display:none">@include('partials.condiciones')</div>
	
	<div class="row">
		<div class="col-md-12 text-center mt-5 mb-3">
			<button id="btnGuardar" type="submit" class="btn btn-outline-success" onclick="return confirm('Una vez enviada la postulación ya no se podrán realizar cambios.');">Enviar</button>
			<br><br>
		</div>
	</div> {{-- row --}}

</div> {{-- container --}}
</form>
<!-- Loader -->
<div class="loader" id="pageloader" style="display: none">
		<div id="circleLoader"></div>
		<div class="textCircle">
			<h2>Su información se esta procesando, <br>espere un momento...</h2>
		</div>
	</div>
<!-- Loader -->
@endsection 


