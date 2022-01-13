@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarfaq')}}" method="post">
	<h1>Crear preguntas frecuentes</h1>
	@include('admin.formularioFaq',['btnText'=>'Enviar'])
</form>
@stop