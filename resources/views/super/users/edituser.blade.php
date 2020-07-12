@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Editing User: {{$user->name}}</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/users/update/'.$user->id) }}" method="POST">
                @csrf()
                <div class="form-group">
					<label class="form-label">Company Name</label>
					<input type="text" class="form-control" name="name" value="{{$user->company->company_name}}" disabled="">
				</div>
				<div class="form-group">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="name" value="{{$user->name}}">
				</div>
				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" value="{{$user->email}}" disabled="">
				</div>
				<div class="form-group">
					<label class="form-label">User Role</label>
					<select class="form-control select2" name="group_id" data-placeholder="{{$user->group->group_name}}">
						@foreach($groups as $key => $group)			
							<option value="{{$user->group_id}}">{{$group->group_name}}
						@endforeach							
					</select>
				</div>

				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="password" class="form-control" name="password" value="{{$user->password}}" disabled="">
				</div>

				<button type="submit" class="btn btn-primary">Add User</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


