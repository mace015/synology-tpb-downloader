@extends('layout.main')

@section('content')

	<h1 class="title">Active downloads</h1>

	<table class="table is-bordered is-striped">
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
					<td> {!! $download->title !!} </td>
					<td> {{ ucfirst($download->status) }} </td>
					<td> 
						<a class="button is-danger is-pulled-right" href="{{ URL::route('download.delete', $download->id) }}"> 
							<span class="icon is-small"> <i class="fa fa-trash"></i> </span>
							<span> Delete </span>
						</a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<h1 class="title">Start a new download</h1>

	{!! Form::open() !!}

		<label class="label">Search</label>
		<p class="control has-addons">
			<input class="input is-expanded" name="search" value="{{ ((isset($search))? $search : '') }}" />

			<button type="submit" class="button is-primary">
				<span class="icon is-small"> <i class="fa fa-search"></i> </span>
				<span> Search </span> 
			</button>
		</p>

	{!! Form::close() !!}

	<table class="table is-bordered is-striped">
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
								<button type="submit" class="button is-primary is-pulled-right">
									<span class="icon is-small"> <i class="fa fa-download"></i> </span>
									<span> Download </span> 
								</button>
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	
@endsection