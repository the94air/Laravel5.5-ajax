<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=500">
	<title>Ajax Laravel CRUD</title>
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Open Sans:800', 'Nunito:600']
			}
		});
	</script>
	<link rel="stylesheet" href="{{ asset('css/app2.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

</head>
<body>
	@include('navbar')
	<main class="container">
		@yield('body')
	</main>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
	<script src="{{ asset('js/refresh.js') }}"></script>
	<script src="{{ asset('js/store.js') }}"></script>
	<script src="{{ asset('js/edit.js') }}"></script>
	<script src="{{ asset('js/update.js') }}"></script>
	<script src="{{ asset('js/show.js') }}"></script>
	<script src="{{ asset('js/destroy.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>