@extends('layouts.app')
@section('content')

<!-- ROW-3 OPEN -->
<div class="row justify-content-md-center mt-xl-9">
	<div class="col-md-4 col-xl-4">
		<div class="card">
			<div class="card-header" style="background-color: red">
				<div class="col text-center">
					<h3 class="card-title mr-5 text-white">Expired Subscription</h3>
				</div>
			</div>
			<div class="card-body text-center">
				<span class="avatar avatar-xxl brround cover-image cover-image" data-image-src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}"></span>
				<h4 class="h4 mb-0 mt-3">{{Auth::user()->name}}</h4>
				<p class="card-text">{{Auth::user()->company->company_name}}</p>
				<div class="alert alert-danger" role="alert">
					<i class="fa fa-exclamation mr-2" aria-hidden="true"></i> Your Subscription has expired. Please contact the site Admistrator.
				</div>
			</div>
			<div class="card-footer text-center">
				<div class="row user-social-detail">
					<div class="col text-center">
						<a href="{{ route('ContactUs')}}" class="btn btn-danger"><strong>Contact Site Administrator</strong></a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- COL END -->
</div>
<!-- ROW-3 CLOSED -->


@endsection