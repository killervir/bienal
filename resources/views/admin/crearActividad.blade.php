@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarActividad')}}" enctype="multipart/form-data" method="post">
	<h1>Crear actividad</h1>
	@include('admin.formularioActividad',['btnText'=>'Enviar'])
</form>
@stop