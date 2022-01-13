@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.actualizarContacto', $contacto->slug)}}" method="post">
	@method('patch')
	<h1>Editar contacto</h1>
	@include('admin.contactoFormulario',['btnText'=>'Actualizar'])
</form>
@stop