@extends('partials.layout')
@section('content')
<div class="row detalle-prensa mb-5">
	
	<div class="col-md-7">
    	<h1>{{$prensa->titulo}}</h1>
        <p class="c-rojo">{{$prensa->fecha_publica}}</p>
    	<h2>{{$prensa->subtitulo}} <br></h2>
        <hr>
        <div class="cuerpo">
        	{!!$prensa->descripcion!!}
        </div>
    </div>
	<div class="offset-md-1 col-md-4">
    	<img src="{{asset('public/storage/prensas/'.$prensa->imagen)}}" alt="">
        @isset($prensa->link_kit) 
        <a class="kit" target="_blank" href="{{$prensa->link_kit}}"><i class="fas fa-cloud-download-alt"></i> Kit de prensa</a>
        @endisset
    </div>
</div>


@stop