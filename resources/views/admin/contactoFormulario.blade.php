@csrf
<div class="row">
	<div class="col-md-4 form-group">
		<label>*Nombre completo o Nombre del área</label>
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $contacto->nombre)}}">
		{!!$errors->first('nombre','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Correo electrónico</label>
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $contacto->email)}}">
		{!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Descripción</label>
		<input type="text" name="decripcion" id="decripcion" class="form-control" value="{{old('decripcion', $contacto->decripcion)}}">
		{!!$errors->first('decripcion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="w-100"></div> {{-- Secciona el formulario con ese valor como el 100% --}}
	<div class="col-md-4 form-group">
		<label>*Teléfono de contacto principal</label>
		<input type="number" name="telefono1" id="telefono1" class="form-control" value="{{old('telefono1', $contacto->telefono1)}}">
		{!!$errors->first('telefono1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Extensión del teléfono 1</label>
		<input type="number" name="extension1" id="extension1" class="form-control" value="{{old('extension1', $contacto->extension1)}}">
		{!!$errors->first('extension1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Teléfono secundario de contacto</label>
		<input type="number" name="telefono2" id="telefono2" class="form-control" value="{{old('telefono2', $contacto->telefono2)}}">
		{!!$errors->first('telefono2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="w-100"></div> {{-- Secciona el formulario con ese valor como el 100% --}}
	<div class="col-md-4 form-group">
		<label>Extensión del teléfono secundario</label>
		<input type="text" name="extension2" id="extension2" class="form-control" value="{{old('extension2', $contacto->extension2)}}">
		{!!$errors->first('extension2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Horario de atención</label>
		<input type="text" name="horario" id="horario" class="form-control" value="{{old('horario', $contacto->horario)}}">
		{!!$errors->first('horario','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Dirección</label>
		<input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion', $contacto->direccion)}}">
		{!!$errors->first('direccion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="w-100"></div>
	<button class="btn btn-outline-primary">{{$btnText}}</button>
</div> {{-- row --}}
