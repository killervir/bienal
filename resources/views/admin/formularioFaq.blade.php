@csrf
<div class="row">
	<div class="col-md-12 form-group">
		<label>*Convocatoria</label>
		<select class="form-control" name="convocatorias_id" id="convocatorias_id">
		<option value="" selected hidden>Seleccione una convocatoria</option>
		    @foreach($convocatorias as $c )
		      @if($c->id==old('convocatorias_id') || $c->id==$preguntasFrecuentes->convocatorias_id)
		        <option selected value="{{$c->id}}">{{$c->titulo_convocatoria}}</option>
		      @else
		        <option value="{{$c->id}}">{{$c->titulo_convocatoria}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('convocatorias_id','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-12 form-group">
		<label>*Pregunta</label>
		<input type="text" name="pregunta" id="pregunta" class="form-control" value="{{old('pregunta', $preguntasFrecuentes->pregunta)}}">
		{!!$errors->first('pregunta','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-12 form-group">
		<label>*Respuesta</label>
		<textarea name="respuesta" id="respuesta" class="form-control">{{old('respuesta', $preguntasFrecuentes->respuesta)}}</textarea>
		{!!$errors->first('respuesta','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div>
<button class="btn btn-outline-primary">{{$btnText}}</button>