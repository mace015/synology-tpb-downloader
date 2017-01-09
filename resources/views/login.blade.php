@extends('layout.main')

@section('content')

	<h1 class="title">Login</h1>

	{{ Form::open() }}

		<label class="label"> Username </label>
		<p class="control">
			<input class="input" type="text" name="username">
		</p>

		<label class="label"> Password </label>
		<p class="control">
			<input class="input" type="password" name="password">
		</p>

		<button type="submit" class="button is-primary is-pulled-right">
			<span class="icon is-small"> <i class="fa fa-unlock"></i> </span>
			<span> Login </span> 
		</button>

	{{ Form::close() }}

@endsection