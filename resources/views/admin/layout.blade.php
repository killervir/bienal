<!DOCTYPE html>
<head>
	@include('admin.head')
</head>
<body>
	@include('admin.header')
	@include('admin.nav')
	<div class="cont-admin container-fluid">
    <div class="col-12 text-right">
		<a class="btn btn-verificacion mt-4 mb-4" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" tabindex="-1" aria-disabled="true">Cerrar sesión</a>
		<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
     </div>
		@yield('content')
	</div>
	@include('admin.scripts')
</body>
</html> 