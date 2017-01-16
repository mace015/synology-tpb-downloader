<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Synology TPB Downloader </title>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	</head>
	<body>

		@include('partials.menu')

		<section class="hero is-primary">
			<div class="hero-body">
				<div class="container">
					<h1 class="title">
						Synology TPB Downloader
					</h1>
				</div>
			</div>
		</section>

		<section class="section">
			<div class="container" id="app">

				@include('partials.flash')

				@yield('content')

			</div>
		</section>

		<script>
		    window.Laravel = { csrfToken: '{{ csrf_token() }}' };
		</script>

		<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

	</body>
</html>