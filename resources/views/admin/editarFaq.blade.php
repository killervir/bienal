@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarFaq', $preguntasFrecuentes->slug)}}" enctype="multipart/form-data" method="post">
	@method('patch')
	<h1>Editar {{$preguntasFrecuentes->pregunta}}</h1>
	@include('admin.formularioFaq',['btnText'=>'Actualizar'])
</form>
@stop