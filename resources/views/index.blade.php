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
			<button type="submit" class="green-button"> Search </button>

		{!! Form::close() !!}

		<table>
			<thead>
				<th> Name </th>
				<th> Status </th>
				<th> Delete </th>
			</thead>
			<tbody>
				@if(count($downloads->tasks) == 0)
					<tr>
						<td colspan="3"> No active downloads </td>
					</tr>
				@endif
				@foreach($downloads->tasks as $download)
					<tr>
						<td> {{ $download->title }} </td>
						<td> {{ ucfirst($download->status) }} </td>
						<td> <a href="{{ URL::route('download.delete', $download->id) }}"> Delete </a> </td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<br>

		<table>
			<thead>
				<th> Name </th>
				<th> Seeders </th>
				<th> Download </th>
			</thead>
			<tbody>
				@if(!isset($results) || count($results) == 0)
					<tr> <td colspan="4" class="center"> @if(!empty($search)) No results found @else No search query @endif </td> </tr>
				@else
					@foreach($results as $result)
						<tr>
							<td> {{ $result->getName() }} </td>
							<td> {{ $result->getSeeders() }} </td>
							<td>
								{{ Form::open(['action' => 'DownloadController@download']) }}
									<input type="hidden" name="magnet" value="{{ $result->getMagnetUrl() }}">
									<button type="submit"> Download </button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>

	</body>
</html>