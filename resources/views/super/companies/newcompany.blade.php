@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">New Company Form</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/companies/addnewcompany') }}" method="POST" enctype="multipart/form-data">
                @csrf()
				<div class="form-group">
					<label class="form-label">Company Name</label>
					<input type="text" class="form-control" name="company_name" placeholder="Company Name">
				</div>

				<div class="form-group">
					<label class="form-label">Address</label>
					<input type="text" class="form-control" name="address" placeholder="Company Address">
				</div>

				<div class="form-group">
					<label class="form-label">State</label>
					<input type="text" class="form-control" name="state" placeholder="State">
				</div>

				<div class="form-group">
					<label class="form-label">City</label>
					<input type="text" class="form-control" name="city" placeholder="City">
				</div>

				<div class="form-group">
					<label class="form-label">Country</label>
					<input type="text" class="form-control" name="country" placeholder="Country">
				</div>

				<div class="form-group">
					<label class="form-label">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="Phone">
				</div>

				<div class="form-group">
					<label class="form-label">Motto</label>
					<input type="text" class="form-control" name="motto" placeholder="Company Motto">
				</div>
				<!-- ROW-3 OPEN -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow">
							<div class="card-header">
								<h3 class="mb-0 card-title">Upload Company Logo</h3>
							</div>
							<div class="card-body">
								<input type="file" class="dropify" data-height="300" name="logo" />
							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- ROW-3 CLOSED -->
				<button type="submit" class="btn btn-primary">Add Company</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection


