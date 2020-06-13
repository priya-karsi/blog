@extends('layouts.app')

@section('main-content')
	<div class="d-flex justify-content-end md-3">
		<a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
		
	</div>

	<div class="card">
		<div class="card-header">
			Categories
			
		</div>
		
		<div class="card-body">
				<table class="table table-bordered">
					
					<thead>
						<th>Name</th>
						<th>Actions</th>
					</thead>

					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"> Edit</a>
								<a href="#" class="btn btn-danger btn-sm"
								onclick="displayModalForm({{ $category }})"
								data-toggle="modal"
								data-target="#deleteModal"
								> Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>


				</table>		
		</div>
	</div>


	<!--Delete Modal-->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <form action="" method="POST" id="deleteForm">
      	@csrf
      	@method('DELETE')
      	<div class="modal-body">
      		<p>Are you sure?</p>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete Category</button>
      </div>
  </form>
    </div>
  </div>
</div>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		function displayModalForm($category){

			var url = '/categories/'+$category.id;
			$('#deleteForm').attr('action', url);
		}
	</script>
@endsection