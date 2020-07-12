@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">New Lawyer Form</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/admin/lawyers/addnewlawyer/'.$company->id) }}" method="POST">
                @csrf()
				<div class="form-group">
					<label class="form-label">Full Name</label>
					<input type="text" class="form-control" name="name" placeholder="Lawyer's Full Name">
				</div>

				
				<div class="form-group">
					<label class="form-label">Designation</label>
					<input type="text" class="form-control" name="designation" placeholder="Lawyer's Designation">
				</div>

				<div class="form-group">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Lawyers's Email">
				</div>

				<div class="form-group">
					<label class="form-label">Password</label>
					<input type="text" class="form-control" name="password" placeholder="Lawyers's Password">
				</div>

				<button type="submit" class="btn btn-primary">Add Lawyer</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection


