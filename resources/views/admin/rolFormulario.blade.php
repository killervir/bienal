@csrf
<div class="row">
	<div class="col-md-6 form-group">
		<label>*Rol</label>
		<input required type="text" name="rol" id="rol" class="form-control" value="{{old('rol', $rol->rol)}}">
		{!!$errors->first('rol','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
    </div>
</div>
<div class="row">
	<div class="col-md-12 form-group">
		<label>Descripción</label>
		<textarea name="descripcion" id="descripcion" class="form-control" cols="10" rows="10">{{old('descripcion', $rol->descripcion)}}</textarea>
		{!!$errors->first('descripcion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
    </div>
    <div class="w-100"></div> 
	<button class="btn btn-outline-primary">{{$btnText}}</button>
</div> {{-- row --}}
