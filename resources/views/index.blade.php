@extends('layout.main')

@section('content')

	<h1 class="title">Active downloads</h1>

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

	<h1 class="title">Start a new download</h1>

	<label class="label">Search</label>
	<p class="control has-addons">
		<input class="input is-expanded" name="search" value="" autocomplete="off" v-model="query" @keyup.enter="search()" />

		<button type="submit" class="button is-primary" v-bind:class="{ 'is-loading': is_loading_results }" @click="search()">
			<span class="icon is-small"> <i class="fa fa-search"></i> </span>
			<span> Search </span>
		</button>
	</p>

	<div class="table-container">
		<table class="table is-bordered is-striped">
			<thead>
				<th> Name </th>
				<th> Seeders </th>
				<th> Download </th>
			</thead>
			<tbody>
				<tr v-show="is_loading_results">
					<td colspan="4"> <strong> Scraping TPB for results, one moment please... </strong> </td>
				</tr>
				<tr v-show="results.length == 0 && !is_loading_results">
					<td colspan="4"> No results found! </td>
				</tr>
				<tr v-show="!is_loading_results" v-for="result in results">
					<td> @{{ result.name }} </td>
					<td> @{{ result.seeders }} </td>
					<td>
						<button type="submit" class="button is-primary is-pulled-right" @click="startDownload(result.magnet, $event)">
							<span class="icon is-small"> <i class="fa fa-download"></i> </span>
							<span> Download </span>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

@endsection
