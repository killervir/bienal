@csrf
<div class="row">
	<div class="col-md-6 form-group">
		<label>*Título</label>
		<input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $actividades->titulo)}}">
		{!!$errors->first('titulo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-6 form-group">
		<label>Imagen</label>
		<input type="file" name="imagen" id="imagen" class="form-control" value="{{old('imagen', $actividades->imagen)}}">
		{!!$errors->first('imagen','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
		<div class="ttip bg-morado">
			<p>Sólo se admiten imágenes en formato jpg, png, bmp o jpeg.</p>
		</div>
	</div>
	<div class="col-md-6">
		<label>*Hipervínculo al facebook de la actividad</label>
		<input type="url" name="link_facebook" id="link_facebook" class="form-control" value="{{old('link_facebook', $actividades->link_facebook)}}">
		{!!$errors->first('link_kit','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-6 form-group">
		<label>*Fecha hora de la actividad</label> 
		<input type="datetime" name="fecha_hora" id="fecha_hora" class="form-control" value="{{old('fecha_hora', $actividades->fecha_hora)}}">
		{!!$errors->first('fecha_hora','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-12 form-group">
		<label>*resumen</label>
		<textarea name="resumen" id="resumen" class="ckeditor">{{old('resumen', $actividades->resumen)}}</textarea>
		{!!$errors->first('resumen','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div>
<button class="btn btn-outline-primary">{{$btnText}}</button>