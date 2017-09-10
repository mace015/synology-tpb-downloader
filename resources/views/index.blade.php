@extends('layout.main')

@section('content')

	<h1 class="title">Active downloads <a class="button is-primary is-pulled-right" @click="openDownloadModal">Start new download</a> </h1>

	<div class="table-container">
		<table class="table is-bordered is-striped">
			<thead>
				<th> Name </th>
				<th> Status </th>
				<th> Delete </th>
			</thead>
			<tbody>
				<tr v-show="is_loading_downloads">
					<td colspan="4" class="center"> <strong> Loading downloads, one moment please... </strong> </td>
				</tr>
				<tr v-show="downloads.length == 0 && !is_loading_downloads">
					<td colspan="3"> No active downloads </td>
				</tr>
				<tr v-show="!is_loading_downloads" v-for="download in downloads">
					<td> @{{ download.title }} </td>
					<td> @{{ download.status }}</td>
					<td>
						<a class="button is-danger is-pulled-right" @click="removeDownload(download.id, $event)">
							<span class="icon is-small"> <i class="fa fa-trash"></i> </span>
							<span> Delete </span>
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	@include('partials.download')

@endsection
