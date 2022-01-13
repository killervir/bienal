<!DOCTYPE html>
<head>
	@include('partials.head')
</head>
<body>
	@include('partials.header')
	@include('partials.nav')
	<div class="container container-fluid">
	@yield('content')		
	</div>
	@include('partials.footer')
	@include('partials.scripts')
</body>
</html>