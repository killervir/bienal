@extends('admin.layout')
@section('content')
<form role="form" action="{{route('admin.guardarPrensa')}}" enctype="multipart/form-data" method="post">
	<h1>Crear prensa</h1>
	@include('admin.formularioPrensa',['btnText'=>'Enviar'])
</form>
@stop