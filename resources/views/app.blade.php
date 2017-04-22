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
				families: ['Kalam', 'Acme']
			}
		});
	</script>
	<link rel="stylesheet" type="text/css" href="{{ Helpers::publicAsset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ Helpers::publicAsset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ Helpers::publicAsset('css/animate.css') }}">

</head>
<body>
	@include('navbar')
	<main class="container">
		@yield('body')
	</main>

	<script src="{{ Helpers::publicAsset('js/jquery.min.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/bootstrap-notify.min.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/refresh.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/store.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/edit.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/update.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/show.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/destroy.js') }}"></script>
	<script src="{{ Helpers::publicAsset('js/app.js') }}"></script>
</body>
</html>