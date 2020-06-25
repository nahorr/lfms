@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">New User Form</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/users/addnewuser') }}" method="POST">
                @csrf()
				<div class="form-group">
					<label class="form-label"> Select a Company</label>
					<select class="form-control select2-show-search" name="company_id" data-placeholder="Select a Company">
						@foreach($companies as $key => $company)
							<option value="{{ $company->id }}">{{ $company->company_name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="name" placeholder="User's Full Name">
				</div>

				<div class="form-group">
					<label class="form-label">User Role</label>
					<select class="form-control select2" name="group_id" data-placeholder="Choose one Role">
						@foreach($users as $key => $user)			
							<option value="{{$user->group_id}}">{{$user->group->group_name}}
						@endforeach							
					</select>
				</div>

				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="User's Email">
				</div>

				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="text" class="form-control" name="password" placeholder="User's Password">
				</div>

				<button type="submit" class="btn btn-primary">Add User</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


