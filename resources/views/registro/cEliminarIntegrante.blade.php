@extends('partials.layout')
@section('content')
<form action="{{route('xix.eliminarIntegrante', $integrante->id)}}" method="post">
	@method('delete') @csrf
	<h4>¿Está seguro que desea eliminar al integrante {{$integrante->integrante}}?</h4>
          <button class="btn btn-success">Sí, eliminar</button>
</form>



@stop