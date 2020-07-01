@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Editting Employee: {{$user->name}}</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/admin/users/update', [$company->id, $user->id]) }}" method="POST">
                @csrf()

                <div class="form-group">
					<label class="form-label">Employee Role</label>
					<input type="text" class="form-control" name="group_name" placeholder="Employee's Full Name" value="{{$user->group->group_name}}" disabled="">
				</div>
				
				<div class="form-group">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="name" placeholder="Employee's Full Name" value="{{$user->name}}">
				</div>

				
				<div class="form-group">
					<label class="form-label">Designation</label>
					<input type="text" class="form-control" name="designation" placeholder="Lawyer's Designation" value="{{$user->designation}}">
				</div>

				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Employee's Email" value="{{$user->email}}" disabled="">
				</div>

				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="text" class="form-control" name="password" placeholder="Please ask employee to change Password" disabled="">
				</div>

				<button type="submit" class="btn btn-primary">Update Employee</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


