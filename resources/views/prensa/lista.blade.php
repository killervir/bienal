@extends('partials.layout')
@section('content')

<div class="lista_prensa mb-5">
	<div class="container">
		<h1 class="mb-5">Prensa</h1>
        <div class="row">
		@foreach($prensa as $p)
			
				<div class="col-md-4 item">
					<a href="{{route('prensaDetalle', $p->slug)}}" class="img-nota">
						<img src="{{asset('public/storage/prensas/'.$p->imagen)}}" alt="">
					</a>
					<h2><a href="{{route('prensaDetalle', $p->slug)}}">{{$p->titulo}}</a></h2>
                    <p class="c-rojo">{{$p->fecha_publica}} </p>
					<h3>{{$p->subtitulo}}</h3>
                    
					{{-- <a href="{{$p->link_kit}}" target="_blank">Ver más</a> --}}
				</div>

		@endforeach
        </div>
	</div>
</div>
	

@endsection