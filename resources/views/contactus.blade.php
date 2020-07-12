@extends('layouts.app')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row mt-xl-9">
	<div class="col-md-12">
		 @include('flash::message')
		 @if (count($errors) > 0)     
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif
		<div class="card">
			<div class="card-header">
				<h3 class="mb-0 card-title">Contact Site Administrator</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ url('/postcontactus') }}">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label">Full Name</label>
								<input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" required="">
							</div>
							<div class="form-group">
								<label class="form-label">Company Name</label>
								<input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required="">
							</div>
							<div class="form-group">
								<label class="form-label">Email</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email" required="">
							</div>
							<div class="form-group">
								<label class="form-label">Phone #</label>
								<input type="text" class="form-control" name="phone_number" placeholder="Enter Your Phone" required="">
							</div>
						</div>
		
						<div class="col-md-12 ">
							<div class="form-group">
								<label class="form-label">Message</label>
								<textarea class="form-control" name="contact_message" rows="4" placeholder="Write your Message here..." required=""></textarea>
							</div>
						</div>
						<div class="col-md-12 ">
							<div class="form-group">
								<button type="submit" class="btn btn-danger">Submit Your Message</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><!-- COL END -->
	
</div>
<!-- ROW-1 CLOSED -->

@endsection