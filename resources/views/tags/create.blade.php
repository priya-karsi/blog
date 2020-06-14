@extends('layouts.app')

@section('main-content')

	<div class="card">
		<div class="card-header">Add Tag
			
		</div>
		<div class="card-body">
			<form action="{{ route('tags.store') }}" method="POST">
			@csrf

			<div class="form-group">
				<label for="name">Name</label>

				<input type="text" 
				value="{{ old('name') }}"
				class="form-control @error('name') is-invalid @enderror"
				name="name" id="name">				

			@error('name')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>
				<div class="form-group">
					<button 
					class="form-group"
					type="submit">Add tag</button>
				</div>

				</form>		
	</div>
</div>
@endsection