@csrf
<div class="row">
	<div class="col-md-4 form-group">
		<label>*Título</label>
		<input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $prensa->titulo)}}">
		{!!$errors->first('titulo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Subtítulo</label>
		<input type="text" name="subtitulo" id="subtitulo" class="form-control" value="{{old('subtitulo', $prensa->subtitulo)}}">
		{!!$errors->first('subtitulo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	
	<div class="col-md-4 form-group">
		<label>*Imagen</label>
		<input type="file" name="imagen" id="imagen" class="form-control" value="{{old('imagen', $prensa->imagen)}}">
		{!!$errors->first('imagen','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
		<div class="ttip bg-morado">
			<p>Sólo se admiten imágenes en formato jpg, png, bmp o jpeg.</p>
		</div>
	</div>
	<div class="col-md-4">
		<label>*Hipervínculo al Kit de prensa</label>
		<input type="url" name="link_kit" id="link_kit" class="form-control" value="{{old('link_kit', $prensa->link_kit)}}">
		{!!$errors->first('link_kit','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Fecha de publicación</label>
		<input type="datetime-local" name="fecha_publica" id="fecha_publica" class="form-control" value="{{old('fecha_publica', $prensa->fecha_publica)}}">
		{!!$errors->first('fecha_publica','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-12 form-group">
		<label>*Descripción</label>
		<textarea name="descripcion" id="descripcion" class="ckeditor">{{old('descripcion', $prensa->descripcion)}}</textarea>
		{!!$errors->first('descripcion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div>
<button class="btn btn-outline-primary">{{$btnText}}</button>