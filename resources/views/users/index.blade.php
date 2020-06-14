@extends('layouts.app')

@section('main-content')
	<div class="d-flex justify-content-end md-3">
		<a href="{{ route('register') }}" class="btn btn-primary">Add user</a>
		
	</div>

	<div class="card">
		<div class="card-header">
			users
			
		</div>
		
		<div class="card-body">
				<table class="table table-bordered">
					
					<thead>
						<th>Image</th>
						<th>Name</th>
						<th>Email</th>
						<th>Posts count</th>
						<th>Actions</th>
					</thead>

					<tbody>
						@foreach($users as $user)
						<tr>
							<td>
								<img src="{{ \Thomaswelton\LaravelGravatar\Facades\Gravatar::src($user->email) }}">
							</td>
							<td>
								{{ $user->name }}
							</td>
							<td>
								{{ $user->email }}
							</td>

							<td>
								{{ $user->posts()->count() }}
							</td>
							<td>
								@if(!$user->isAdmin())
								<form action="{{ route('users.make-admin',$user->id) }}" method=POST>
									@csrf
									@method('PUT')
									<button type="submit" class="btn btn-outline-danger">
										MakeAdmin
									</button>
								</form>
								@endif
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
        <h5 class="modal-title" id="exampleModalLongTitle">Delete user</h5>
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
        <button type="submit" class="btn btn-danger">Delete user</button>
      </div>
  </form>
    </div>
  </div>
</div>

@endsection

@section('page-level-scripts')
	<script type="text/javascript">
		function displayModalForm($user){

			var url = '/users/'+$user.id;
			$('#deleteForm').attr('action', url);
		}
	</script>
@endsection