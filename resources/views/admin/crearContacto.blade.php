@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarContacto')}}" method="post">
	<h1>Crear contacto</h1>
	@include('admin.contactoFormulario',['btnText'=>'Enviar'])
</form>
@stop