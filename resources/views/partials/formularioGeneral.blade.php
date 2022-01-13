@csrf
<div class="row">
	<div class="mb-3 col-md-12">
		
	</div> {{-- col --}}
</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>*Nombre(s)</label>
		<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $registro->nombre)}}">
		{!!$errors->first('nombre','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Apellido 1</label>
		<input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" value="{{old('apellidoPaterno', $registro->apellidoPaterno)}}">
		{!!$errors->first('apellidoPaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>Apellido 2</label>
		<input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" value="{{old('apellidoMaterno', $registro->apellidoMaterno)}}">
		{!!$errors->first('apellidoMaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
<div class="row">
<div class="offset-md-1 col-md-10 form-group">
		<label>Nombre artístico</label>
		<input type="text" name="nombreArtistico" id="nombreArtistico" class="form-control" value="{{old('nombreArtistico', $registro->nombreArtistico)}}">
		{!!$errors->first('nombreArtistico','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div>	{{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>*Fecha de nacimiento</label>
		<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control unstyled" value="{{old('fechaNacimiento', $registro->fechaNacimiento)}}">
		{!!$errors->first('fechaNacimiento','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Nacionalidad</label>
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
		<label>*Lugar de residencia</label>
		<input type="text" name="lugarResidencia" id="lugarResidencia" class="form-control" value="{{old('lugarResidencia', $registro->lugarResidencia)}}">
		{!!$errors->first('lugarResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-5 form-group">
		<label>*Correo electrónico</label>
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $registro->email)}}">
		{!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-5 form-group">
		<label>*Confirmación del correo electrónico</label>
		<input type="email" name="emailConfirmacion" id="emailConfirmacion" class="form-control" value="{{old('emailConfirmacion', $registro->email)}}">
		{!!$errors->first('emailConfirmacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

		<div class="offset-md-1 col-md-5 form-group">
		<label>*Teléfono fijo o movil de contacto</label>
		<input type="number" name="telefono" id="telefono" class="form-control numerito" value="{{old('telefono', $registro->telefono)}}">
		{!!$errors->first('telefono','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
		<div class="col-md-5 form-group">
		<label>Extensión</label>
		<input type="number" name="extension" id="extension" class="form-control" value="{{old('extension', $registro->extension)}}">
		{!!$errors->first('extension','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
<div class="row">

	<div class="offset-md-1 col-md-10 form-group">
		<label>*Semblanza ​ (max.​ 500 caracteres)</label>
		<textarea name="semblanza" id="semblanza" class="form-control" maxlength="500">{{old('semblanza', $registro->semblanza)}}</textarea>
		{!!$errors->first('semblanza','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
		<span id="rchars">500</span> Caracter(es) restante(s)
	</div>
	<div class="offset-md-1 col-md-10 form-group">
		<label>*Adjuntar documentos personales</label>
		<input type="file" name="documentosPersonales" id="documentosPersonales" class="form-control" value="{{old('documentosPersonales', $registro->documentosPersonales)}}">
		<div class="ttip bg-morado">
			<p>Un solo documento (PDF, no mayor a 2MB) que incluya:</p> 
			<ul>
				<li>Copia de identificación oficial vigente (credencial de elector por ambos lados o pasaporte).</li>
				<li>Clave única de registro de población (CURP), en el caso de participantes mexicanos/as</li>
				<li>Currículum vitae de tres cuartillas máximo (5000 caracteres con espacios incluidos).</li>
				<li>Para personas extranjeras residentes en México, además agregar copia de visa de residencia
vigente, expedida por el INM.</li>
			</ul>			
		</div>
		
		{!!$errors->first('documentosPersonales','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
