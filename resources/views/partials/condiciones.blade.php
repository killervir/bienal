<div class="row terminos">
	<div class="offset-md-1 col-md-11 form-group">
		<input type="checkbox" name="bases" value=1 {{old('bases', $registro->bases)?'checked':null}}>
		<label>Acepto las bases, términos y condiciones de la presente convocatoria.</label> 
		{!!$errors->first('bases','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}<br>
	</div>
	<div class="offset-md-1 col-md-11 form-group">
		<input type="checkbox" name="privacidad" value=1 {{old('privacidad', $registro->privacidad)?'checked': null}}>
		<label>He leído y acepto el  <a href="{{ url('https://www.gob.mx/privacidadintegral') }}" target="_blank">aviso de privacidad</a>.</label> <br>
		{!!$errors->first('privacidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}