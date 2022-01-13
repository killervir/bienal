@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarRol', $rol->id)}}" method="post">
	@method('patch')
	<h1>Editar rol</h1>
	@include('admin.rolFormulario',['btnText'=>'Actualizar'])
</form>
@stop