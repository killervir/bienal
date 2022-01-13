<div class="row">
	<div class="offset-md-1 col-md-5 form-group">
		<label>*Nombre del Colectivo</label>
		<input type="text" name="nombreColectivo" id="nombreColectivo" class="form-control" value="{{old('nombreColectivo', $registro->nombreColectivo)}}">
		{!!$errors->first('nombreColectivo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-5 form-group">
		<label>*Nombre completo de integrantes del colectivo</label>
		<div id="items">
		 	<div><input type="text" class="form-control" name="integrantes[]" id='integrantes[]'></div> <br>
		 	{!!$errors->first('integrantes','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
		 	<a class="btn btn-outline-primary" id="add">Agregar integrante</a>
		</div>
	</div> {{-- col --}}
</div> {{-- row --}}
