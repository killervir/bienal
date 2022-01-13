@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarActividad', $actividades->slug)}}" enctype="multipart/form-data" method="post">
	@method('patch')
	<h1>Editar {{$actividades->titulo}}</h1>
	<h4>Editado por última vez por: {{$nombre}}</h4>

	@include('admin.formularioActividad',['btnText'=>'Actualizar'])
</form>
@stop