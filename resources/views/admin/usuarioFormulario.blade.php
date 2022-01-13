@csrf
<div class="row">
	<div class="col-md-6 form-group">
		<label>*Usuario</label>
		<input required type="text" name="name" id="name" class="form-control" value="{{old('name', $usuario->name)}}">
		{!!$errors->first('name','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>
	<div class="col-md-6 form-group">
		<label>Correo electrónico</label>
		<input type="email" name="email" id="email" class="form-control" value="{{old('email', $usuario->email)}}">
		{!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
    </div>	
    <div class="w-100"></div>
    <div class="col-md-6 form-group">
        <label>Contraseña</label>        
            <input id="password" type="password" class="form-control" name="password">            
            @error('password')
            {!!$errors->first('password','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
            @enderror        
    </div>
    <div class="col-md-6 form-group">
        <label>Confirmar contraseña</label>        
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">        
    </div>
    <div class="w-100"></div>    
    <div class="row terminos">
        <label>Permisos</label>
        
        @foreach ($roles as $rol)
        
        <div class="offset-md-1 col-md-11 form-group">
            <input type="checkbox" name="roles[]" value={{$rol->id}}  {{old('roles',$usuario->roles->contains($rol->id))?'checked':null}}>
        <label>{{$rol->rol}}</label> 
            {!!$errors->first('roles','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}<br>
        </div>
        @endforeach
        
    </div> {{-- row --}}
    <div class="w-100"></div>
	<button class="btn btn-outline-primary">{{$btnText}}</button>
</div> {{-- row --}}
