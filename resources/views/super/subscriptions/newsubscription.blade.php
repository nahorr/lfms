@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-dollar"></i> New Manuel subscription Form</h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/subscriptions/addnewsubscription') }}" method="POST">
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
					<label class="form-label">Subscription Currency</label>
					<input type="text" class="form-control" name="subscription_currency" placeholder="Enter currency e.g. NGN, CAD, USD, etc..">
				</div>

				<div class="form-group">
					<label class="form-label">Amount</label>
					<input type="number" class="form-control" name="subscription_amount" placeholder="Enter Subscription Amount Paid">
				</div>

				<div class="form-group">
					<label class="form-label">Subscription Method</label>
					<input type="text" class="form-control" name="subscription_method" value="Manual" disabled="">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Name</label>
					<input type="text" class="form-control" name="subscriber_name" placeholder="Subscriber Name">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Phone</label>
					<input type="text" class="form-control" name="subscriber_phone" placeholder="Subscriber Phone">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Email</label>
					<input type="text" class="form-control" name="subscriber_email" placeholder="Subscriber Email">
				</div>

				<button type="submit" class="btn btn-primary">Add subscription</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


