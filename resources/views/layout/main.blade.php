<html>
	<head>
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
			<div class="container">

				@include('partials.flash')

				@yield('content')

			</div>
		</section>

	</body>
</html>