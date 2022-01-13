
@csrf
<div class="row">
</div>{{-- row --}}
<div class="row">
	<div class="mb-3 col-md-12">
		<h2><font>{{$postType}}</font></h2>
	</div> {{-- col --}}
</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>Nombre(s) {{$adicional}}</label>
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $registro->nombre)}}">
		{!!$errors->first('nombre','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group"> 
		<label>Apellido materno {{$adicional}}</label>
		<input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" value="{{old('apellidoPaterno', $registro->apellidoPaterno)}}">
		{!!$errors->first('apellidoPaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Apellido paterno {{$adicional}}</label>
		<input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" value="{{old('apellidoMaterno', $registro->apellidoMaterno)}}">
		{!!$errors->first('apellidoMaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>Fecha de nacimiento {{$adicional}}</label>
		<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{old('fechaNacimiento', $registro->fechaNacimiento)}}">
		{!!$errors->first('fechaNacimiento','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Nacionalidad {{$adicional}}</label>
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
		<label>Lugar de residencia {{$adicional}}</label>
		<input type="text" name="lugarResidencia" id="lugarResidencia" class="form-control" value="{{old('lugarResidencia', $registro->lugarResidencia)}}">
		{!!$errors->first('lugarResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>Correo electrónico {{$adicional}}</label>
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $registro->email)}}">
		{!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Confirmación del correo electrónico {{$adicional}}</label>
		<input type="email" name="emailConfirmacion" id="emailConfirmacion" class="form-control" value="{{old('emailConfirmacion')}}">
		{!!$errors->first('emailConfirmacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Teléfono fijo o movil de contacto {{$adicional}}</label>
		<input type="number" name="telefono" id="telefono" class="form-control numerito" value="{{old('telefono', $registro->telefono)}}">
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
		<label>Semblanza {{$adicional2}}</label>
		<textarea name="semblanza" id="semblanza" class="form-control" maxlength="200">{{old('semblanza', $registro->semblanza)}}</textarea>
		{!!$errors->first('semblanza','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Adjuntar documentos personales {{$adicional}}</label>
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
