@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Editing Company: {{$company->company_name}}</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/companies/update/'.$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf()
				<div class="form-group">
					<label class="form-label">Company Name</label>
					<input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{$company->company_name}}">
				</div>

				<div class="form-group">
					<label class="form-label">Address</label>
					<input type="text" class="form-control" name="address" placeholder="Company Address" value="{{$company->address}}">
				</div>

				<div class="form-group">
					<label class="form-label">State</label>
					<input type="text" class="form-control" name="state" placeholder="State" value="{{$company->state}}">
				</div>

				<div class="form-group">
					<label class="form-label">City</label>
					<input type="text" class="form-control" name="city" placeholder="City" value="{{$company->city}}">
				</div>

				<div class="form-group">
					<label class="form-label">Country</label>
					<input type="text" class="form-control" name="country" placeholder="Country" value="{{$company->country}}">
				</div>

				<div class="form-group">
					<label class="form-label">Phone</label>
					<input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$company->phone}}">
				</div>

				<div class="form-group">
					<label class="form-label">Motto</label>
					<input type="text" class="form-control" name="motto" placeholder="Company Motto" value="{{$company->motto}}">
				</div>
				<!-- ROW-3 OPEN -->
				<div class="row">
					<div class="col-lg-6">
						<div class="card shadow">
							<div class="card-header">
								<h3 class="mb-0 card-title">Update Company Logo</h3>
							</div>
							<div class="card-body">
								<input type="file" class="dropify" data-height="300" name="logo" />
							</div>
						</div>
					</div><!-- COL END -->
					<div class="col-lg-6">
						<div class="card shadow">
							<div class="card-header">
								<h3 class="mb-0 card-title">Current Company Logo</h3>
							</div>
							<div class="card-body">
								<a href="{{ asset('/uploads/companies/logo/'.$company->logo) }}">
									<img class="img-responsive mb-0" src="{{ asset('/uploads/companies/logos/'.$company->logo) }}" alt="{{$company->company_name}}">
								</a>
							</div>
						</div>
					</div><!-- COL END -->
				</div>
				<!-- ROW-3 CLOSED -->
				<button type="submit" class="btn btn-primary">Update Company</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection


