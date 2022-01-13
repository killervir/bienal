@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarPrensa', $prensa->slug)}}" enctype="multipart/form-data" method="post">
	@method('patch')
	<h1>Editar {{$prensa->titulo}}</h1>
	<h4>Editado por última vez por: {{$nombre}}</h4>

	@include('admin.formularioPrensa',['btnText'=>'Actualizar'])
</form>
@stop