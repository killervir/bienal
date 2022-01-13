@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarRol')}}" method="post">
	<h1>Crear rol</h1>
	@include('admin.rolFormulario',['btnText'=>'Enviar'])
</form>
@stop