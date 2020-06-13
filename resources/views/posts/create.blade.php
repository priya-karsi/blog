@extends('layouts.app')

@section('main-content')

	<div class="card">
		<div class="card-header">Add Post
			
		</div>
		<div class="card-body">
			<form action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
			@csrf

			<div class="form-group">
				<label for="title">Title</label>

				<input type="text" 
				value="{{ old('title') }}"
				class="form-control @error('title') is-invalid @enderror"
				name="title" id="name">				

			@error('title')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>



			<div class="form-group">
				<label for="excerpt">Excerpt</label>

				<textarea name="excerpt"
				id="excerpt"
				class="form-control @error('excerpt') is-invalid @enderror"
				rows="4"
				>{{ old('excerpt') }}</textarea>		

			@error('excerpt')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>


			<div class="form-group">
				<label for="content">Content</label>

			<textarea name="content"
				id="content"
				class="form-control @error('content') is-invalid @enderror"
				rows="4"
				>{{ old('content') }}</textarea>		
	

			@error('content')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>

			<div class="form-group">
				<label for="published_at">Published At</label>

				<input type="date" 
				value="{{ old('published_at') }}"
				class="form-control @error('published_at') is-invalid @enderror"
				name="published_at" id="published_at">				

			@error('published_at')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>

			<div class="form-group">
				<label for="image">Image</label>

				<input type="file" 
				value="{{ old('image') }}"
				class="form-control @error('image') is-invalid @enderror"
				name="image" id="image">				

			@error('image')
				<p class="form-group">
					{{ $message }}
				</p>
			@enderror
			</div>
				<div class="form-group">
					<button 
					class="form-group"
					type="submit">Add Post</button>
				</div>

				</form>		
	</div>
</div>
@endsection