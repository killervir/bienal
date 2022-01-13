@extends('partials.layout')
@section('content')
<div class="contacto">
  <div class="container">
    <h1 class="mb-5">Contacto</h1>
    @foreach($contacto as $c)
    <div class="col-12 mb-5">
      <h2 class=" c-rojo">{{$c->nombre}}</h2>
      @isset($c->descripcion)<p class="descripcion">{{$c->descripcion}}</p>@endisset
      <div class="row pl-4 itemsrow">
        <div class="col-md-6 telefonos">
          <h3><i class="fas fa-mobile-alt"></i> Télefono</h3>
          <div class="row">
            <div class="col-12">
              @isset($c->telefono2)<h4> telefono 1</h4>@endisset
              <p> {{$c->telefono1}} @isset($c->extension1) ext. {{$c->extension1}} @endisset</p>
            </div>
            @isset($c->telefono2)
            <div class="col-12">
              <h4>telefono 2</h4>
              <p>{{$c->telefono2}} @isset($c->extension1) ext. {{$c->extension2}} @endisset</p>
            </div>
			@endisset
          </div>
			<hr>
        </div>
		@isset($c->email)
        <div class="col-md-6">
		
          <h3><i class="far fa-envelope"></i> Correo electrónico</h3>
          <p> {{$c->email}}</p>
			<hr>
        </div>
		  @endisset
		 @isset($c->direccion)
        <div class="col-md-6">
          <h3><i class="far fa-building"></i> Dirección</h3>
          <p> {{$c->direccion}}</p>
			<hr>
        </div>
		 @endisset
		  
			@isset($c->horario)
            <div class="col-md-6">
              <h3><i class="far fa-clock"></i> Horario de atención</h3>
              <p>{{$c->horario}}</p>
				<hr>
            </div>
			@endisset
      </div>
    </div>
    @endforeach </div>
</div>
@endsection