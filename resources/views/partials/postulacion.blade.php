<div class="row">

	<div class="offset-md-1 col-md-6 form-group">
		<label>*Tipo de postulación.</label>
		<select class="form-control" name="tipoPostulacion" id="tipoPostulacion">
		<option value="" selected hidden>Seleccione un tipo de postulación</option>
		    @foreach($tipoPostulacion as $tp )
		      @if($tp->id==old('tipoPostulacion') || $tp->id==$registro->tipoPostulacion)
		        <option selected value="{{$tp->id}}">{{$tp->campo}}</option>
		      @else
		        <option value="{{$tp->id}}">{{$tp->campo}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('tipoPostulacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div> {{-- col --}}
	{{--<div class="col-md-6 folio">
		<p >Folio de registro: <span>@if(old('folio')=='') {{$folio}} @else {{old('folio')}} @endif</span></p>
		 <input type="hidden" name="folio" id="folio" @if(old('folio')=='') value="{{$folio}}" @else value="{{old('folio')}}" @endif>
	</div>--}}{{--  col --}}
</div> {{-- row --}}
