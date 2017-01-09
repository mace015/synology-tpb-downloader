@if($errors->any())
    @foreach($errors->all() as $error)
        @if(is_array($error))
            @foreach($error as $suberror)
            	<div class="notification is-danger">
					<button class="delete"></button>
					{{ $suberror }}
				</div>
            @endforeach
        @else
        	<div class="notification is-danger">
				<button class="delete"></button>
				{{ $error }}
			</div>
        @endif
    @endforeach
@endif

@if(Session::has('success'))
    @if(is_array(Session::get('success')))
        @foreach(Session::pull('success') as $success)
            <div class="notification is-primary">
				<button class="delete"></button>
				{{ $success }}
			</div>
        @endforeach
    @else
    	<div class="notification is-primary">
			<button class="delete"></button>
			{{ ucfirst(Session::pull('success')) }}
		</div>
    @endif
@endif