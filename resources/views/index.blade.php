<html>
	<head>
		<title> Synology TPB Downloader </title>

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	</head>
	<body>

		<h1> Synology TPB Downloader </h1>
		
		{!! Form::open() !!}

			<input name="search" value="{{ ((isset($search))? $search : '') }}" />
			<button type="submit"> Search </button>

		{!! Form::close() !!}

		<table>
			<thead>
				<th> Name </th>
				<th> Seeders </th>
				<th> Link </th>
				<th> Magnet </th>
			</thead>
			<tbody>
				@if(!isset($results) || count($results) == 0)
					<tr> <td colspan="4" class="center"> @if(!empty($search)) No results found @else No search query @endif </td> </tr>
				@else
					@foreach($results as $result)
						<tr>
							<td> {{ $result->getName() }} </td>
							<td> {{ $result->getSeeders() }} </td>
							<td> <a href="{{ $result->getTorrentUrl() }}"> Link </a> </td>
							<td> <a href="{{ $result->getMagnetUrl() }}"> Magnet </a> </td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>

	</body>
</html>