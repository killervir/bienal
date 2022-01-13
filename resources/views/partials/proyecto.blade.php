<div class="row">
	<div class="col-md-12">
		<h2 class="mb-5">Sobre la obra</h2>
	</div>
</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-3 form-group">
		<label>*Disciplina</label>
		<select class="form-control" name="disciplina" id="disciplina">
			<option value="" selected hidden>Seleccione una disciplina</option>
			@foreach($disciplina as $d )
			@if($d->id==old('disciplina') || $d->id==$registro->disciplina)
			<option selected value="{{$d->id}}">{{$d->disciplina}}</option>
			@else
			<option value="{{$d->id}}">{{$d->disciplina}}</option>
			@endif
			@endforeach
		</select>
		{!!$errors->first('disciplina','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-4 form-group">
		<label>*Título de la obra</label>
		<input type="text" name="tituloProyecto" id="tituloProyecto" class="form-control" placeholder="Ej. Tonatzin al atardecer" value="{{old('tituloProyecto', $registro->tituloProyecto)}}">
		{!!$errors->first('tituloProyecto','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-3 form-group">
		<label>*Año de realización</label>
		<input type="number" name="anoRealizacion" id="anoRealizacion" class="form-control" placeholder="Ej. 2019" value="{{old('anoRealizacion', $registro->anoRealizacion)}}">
		{!!$errors->first('anoRealizacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}
<div class="row">
	<div class="offset-md-1 col-md-10 form-group">
		<label>*Sinopsis de la propuesta​ ​ (max. 200 caracteres)</label>
		<textarea name="descripcionProyecto" id="descripcionProyecto" class="form-control" placeholder="Ej. Sinopsis de la propuesta​" maxlength="200">{{old('descripcionProyecto', $registro->descripcionProyecto)}}</textarea>
		{!!$errors->first('descripcionProyecto','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
		<span id="rcharsd">200</span> Caracter(es) restante(s)
	</div>
	<div class="offset-md-1 col-md-10 form-group">
		<label>*Adjuntar propuesta</label>
		<input type="file" name="adjuntarProyecto" id="adjuntarProyecto" class="form-control" value="{{old('adjuntarProyecto')}}">
		<div class="ttip bg-morado">
			<p>Un solo documento (PDF, no mayor a 15MB) que incluya:</p>
			<ul>
				<li>Título de la obra.</li>
				<li>Año de realización.</li>
				<li>Descripción de la obra (máximo 2000 caracteres con espacios incluidos).</li>
				<li>Imagen(es) de la obra. Para piezas de video, un ​ still ​ de video de 800 x 600 DPI en formato
					JPG.</li>
				<li>Ficha técnica de la obra, sea serie o pieza única, con la siguiente información:
					<ul>
						<li>Título</li>
						<li>Año de realización</li>
						<li>Técnica de realización</li>
						<li>Medidas en centímetros (alto x ancho x profundidad).</li>
						<li>Para piezas de video, indicar la resolución
							y la duración en minutos y segundos, y el enlace y contraseña de acceso para visualización en internet.</li>
					</ul>
				</li>
				
				<li>Propuesta de producción de la obra, sea serie o pieza única, con las siguientes
					características:
					<ul>
						<li>Tipo de impresión (digital y/o análoga)</li>
						<li>Sustrato (papel, trovicel, vinil, etcétera)</li>
						<li>Características del montaje (marialuisa, trovicel, foamboard, etcétera)</li>
						<li>Tipo de enmarcado, si así se requiere (moldura en madera, aluminio,
							encapsulado, etcétera)</li>
						<li>Para piezas de video, indicar la lista de equipo y aditamentos</li>
					</ul>
				</li>
				<li>Esquema de montaje.</li>
			</ul>
		</div>
		{!!$errors->first('adjuntarProyecto','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
</div> {{-- row --}}