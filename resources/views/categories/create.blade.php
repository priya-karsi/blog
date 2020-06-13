@extends('layouts.app')

@section('main-content')

	<div class="card">
		<div class="card-header">Add Category
			
		</div>
		<div class="card-body">
			<form action="{{ route('categories.store') }}" method="POST">
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
					type="submit">Add Category</button>
				</div>

				</form>		
	</div>
</div>
@endsection