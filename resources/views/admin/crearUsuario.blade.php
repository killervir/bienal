@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarUsuario')}}" method="post">
	<h1>Crear usuario</h1>
	@include('admin.usuarioFormulario',['btnText'=>'Enviar'])
</form>
@stop