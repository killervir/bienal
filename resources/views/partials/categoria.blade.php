<div class="row">

	<div class="offset-md-1 col-md-6 form-group">
		<label>*Categoría.</label>
		<select class="form-control" name="categorias" id="categorias">
		<option value="" selected hidden>Seleccione una categoría</option>
		    @foreach($categorias as $cat )
		      @if($cat->id==old('categorias') || $cat->id==$registro->categorias)
		        <option selected value="{{$cat->id}}">{{$cat->catNombre}}</option>
		      @else
		        <option value="{{$cat->id}}">{{$cat->catNombre}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('categorias','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div> {{-- col --}}	
</div> {{-- row --}}