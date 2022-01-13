@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarUsuario', $usuario->id)}}" method="post">
	@method('patch')
	<h1>Editar usuario</h1>
	@include('admin.usuarioFormulario',['btnText'=>'Actualizar'])
</form>
@stop