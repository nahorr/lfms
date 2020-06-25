@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">New Employee Form</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/admin/users/addnewuser/'.$company->id) }}" method="POST">
                @csrf()

                <div class="form-group">
					<label class="form-label"> Employee Role </label>
					<select class="form-control select2-show-search" name="group_id" data-placeholder="Select a Role">
						@foreach($roles as $key => $role)
							<option value="{{ $role->id }}">{{ $role->group_name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="name" placeholder="Employee's Full Name">
				</div>

				
				<div class="form-group">
					<label class="form-label">Designation</label>
					<input type="text" class="form-control" name="designation" placeholder="Lawyer's Designation">
				</div>

				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Employee's Email">
				</div>

				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="text" class="form-control" name="password" placeholder="Employee's Password">
				</div>

				<button type="submit" class="btn btn-primary">Add Employee</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


