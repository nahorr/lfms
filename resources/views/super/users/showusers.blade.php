@extends('layouts.app_user')
@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
	<div class="col-md-12 col-lg-12">
		@include('flash::message')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mr-10"><i class="fa fa-users"></i> Users Table</h3>
				<a href="{{ url('/super/users/newuser') }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
		          <span>
		              <i class="fa fa-plus"></i>
		          </span> <strong>New User</strong>
		        </a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Comapny</th>
								<th>Role</th>
								<th>Verified</th>
								<th>Deleted</th>
								<th>Created</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->company->company_name }}</td>
								<td>{{ $user->group->group_name }}</td>
								<td>
									@if($user->email_verified_at != NULL)
										Verified
									@else
										Not Verified
									@endif
								</td>
								<td>
									@if($user->deleted_at != Null)
										<span style="color: red">Deleted</span>
									@else
										<span style="color: green">Active</span>
									@endif
								</td>
								<td>{{ $user->created_at->toFormattedDateString() }}</td>
								<td>
									@if($user->deleted_at != Null)
										<a href="{{ url('/super/users/undelete/'.$user->id) }}" id="undelete_user-{{$user->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="unDelete" 	
											onclick="
													 event.preventDefault();
	                                                 document.getElementById( "undelete_user-{{$user->id}} ").submit();
	                                                 return confirm('Are you sure you want to Delete this user?')">
	                                            <i class="fa fa-recycle"></i>
										</a>
	                                    <form id="undelete_user-{{$user->id}}" action="{{ url('/super/users/undelete/'.$user->id) }}" method="POST" style="display: none;">
		                                    @csrf
		                                </form>
	                                @else
	                                	<a href="{{ url('/super/users/delete/'.$user->id) }}" id="delete_user-{{$user->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete" 	
											onclick="
													 event.preventDefault();
	                                                 document.getElementById( "delete_user-{{$user->id}} ").submit();
	                                                 return confirm('Are you sure you want to Delete this user?')">
	                                            <i class="fa fa-trash"></i>
										</a>
	                                    <form id="delete_user-{{$user->id}}" action="{{ url('/super/users/delete/'.$user->id) }}" method="POST" style="display: none;">
		                                    @csrf
		                                </form>
		                            @endif

									<a href="{{ url('/super/users/edituser/'.$user->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
									
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ROW-4 CLOSED-->
@endsection


