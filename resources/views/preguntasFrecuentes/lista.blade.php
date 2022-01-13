@extends('partials.layout')
@section('content')
<div class="">
	<div class="container">
		<h1>Preguntas frecuentes</h1>
		<ul class="preguntas_frecuentes">
			@foreach($preguntasFrecuentes as $faq)
				<li>{{$faq->pregunta}}</li>
				<ul>
					<li>{{$faq->respuesta}}</li>
				</ul>
			@endforeach
		</ul>

</div>
@endsection