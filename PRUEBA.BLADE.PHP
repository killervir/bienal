
@csrf
<div class="row">
	<div class="mb-3 col-md-12">
		<h3><center><font>Postulación indivudual</font></center></h3>
	</div> {{-- col --}}
</div> {{-- row --}}
<div class="row">
	<div class="col-md-4 form-group">
		<label>Nombre </label>
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $registro->nombre)}}">
		{!!$errors->first('nombre','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Apellido materno </label>
		<input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" value="{{old('apellidoPaterno', $registro->apellidoPaterno)}}">
		{!!$errors->first('apellidoPaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Apellido paterno </label>
		<input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" value="{{old('apellidoMaterno', $registro->apellidoMaterno)}}">
		{!!$errors->first('apellidoMaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
<div class="row">
	<div class="col-md-4 form-group">
		<label>Fecha de nacimiento </label>
		<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{old('fechaNacimiento', $registro->fechaNacimiento)}}">
		{!!$errors->first('fechaNacimiento','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Nacionalidad </label>
		<select class="form-control" name="id_nacionalidad" id="id_nacionalidad">
		<option value="" selected hidden>Seleccione una nacionalidad</option>
		    @foreach($nacionalidad as $n )
		      @if($n->id==old('id_nacionalidad') || $n->id==$registro->id_nacionalidad)
		        <option selected value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @else
		        <option value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('id_nacionalidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Lugar de residencia </label>
		<input type="text" name="lugarResidencia" id="lugarResidencia" class="form-control" value="{{old('lugarResidencia', $registro->lugarResidencia)}}">
		{!!$errors->first('lugarResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

</div> {{-- row --}}
<div class="row">
	<div class="col-md-4 form-group">
		<label>Correo electrónico </label>
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $registro->email)}}">
		{!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Confirmación del correo electrónico </label>
		<input type="email" name="emailConfirmacion" id="emailConfirmacion" class="form-control" value="{{old('emailConfirmacion')}}">
		{!!$errors->first('emailConfirmacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Teléfono fijo o movil de contacto </label>
		<input type="number" name="telefono" id="telefono" class="form-control" value="{{old('telefono', $registro->telefono)}}">
		{!!$errors->first('telefono','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

</div> {{-- row --}}
<div class="row">
	<div class="col-md-4 form-group">
		<label>Extensión</label>
		<input type="number" name="extension" id="extension" class="form-control" value="{{old('extension', $registro->extension)}}">
		{!!$errors->first('extension','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Semblanza</label>
		<textarea name="semblanza" id="semblanza" class="form-control">{{old('semblanza', $registro->semblanza)}}</textarea>
		{!!$errors->first('semblanza','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Adjuntar documentos personales </label>
		<input type="file" name="documentosPersonales" id="documentosPersonales" class="form-control" value="{{old('documentosPersonales', $registro->documentosPersonales)}}">
		<div class="ttip bg-morado">
			<p>Un solo documento (PDF, no mayor a 2MB) con documentos personales:</p> 
			<ul>
				<li>identificación oficial vigente</li>
				<li>Curriculum vitae</li>
				<li>CURP</li>
			</ul>
			<p>*En caso de ser extranjero presentar comprobante de residencia legal en México</p>
		</div>
		
		{!!$errors->first('documentosPersonales','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
