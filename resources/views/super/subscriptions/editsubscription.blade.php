@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-12">
		@include('flash::message')
		@include('super.formerror')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title"><i class="fa fa-dollar"></i> Editing Manuel Subscription: <span style="color: purple">{{$subscription->company->company_name}}</span></h3>
			</div>
			<div class="card-body">
			<form action="{{ url('/super/subscriptions/update/'.$subscription->id) }}" method="POST">
                @csrf()
		
				<div class="form-group">
					<label class="form-label">Subscription Currency</label>
					<input type="text" class="form-control" name="subscription_currency" value="{{$subscription->subscription_currency}}">
				</div>

				<div class="form-group">
					<label class="form-label">Amount</label>
					<input type="number" class="form-control" name="subscription_amount" value="{{$subscription->subscription_amount}}">
				</div>

				<div class="form-group">
					<label class="form-label">Subscription Method</label>
					<input type="text" class="form-control" name="subscription_method" value="Manual" disabled="">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Name</label>
					<input type="text" class="form-control" name="subscriber_name" value="{{$subscription->subscriber_name}}">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Phone</label>
					<input type="text" class="form-control" name="subscriber_phone" value="{{$subscription->subscriber_phone}}">
				</div>

				<div class="form-group">
					<label class="form-label">Subscriber Email</label>
					<input type="text" class="form-control" name="subscriber_email" value="{{$subscription->subscriber_email}}">
				</div>

				<button type="submit" class="btn btn-primary">Update Subscription</button>
			</form>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->


@endsection


