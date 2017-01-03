<html>
	<head>
		<title> Synology TPB Downloader </title>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	</head>
	<body>

		<h1> Synology TPB Downloader </h1>
		
		{!! Form::open() !!}

			<input name="dork" />
			<button type="submit"> Search </button>

		{!! Form::close() !!}

		@if(!isset($results))
			<p>No results found.</p>
		@else
			<table>
				<thead>
					<th> Name </th>
					<th> Seeders </th>
					<th> Link </th>
					<th> Magnet </th>
				</thead>
				@foreach($results as $result)
					<tr>
						<td> {{ $result->getName() }} </td>
						<td> {{ $result->getSeeders() }} </td>
						<td> <a href="{{ $result->getTorrentUrl() }}"> Link </a> </td>
						<td> <a href="{{ $result->getMagnetUrl() }}"> Magnet </a> </td>
					</tr>
				@endforeach
			</table>
		@endif

	</body>
</html>