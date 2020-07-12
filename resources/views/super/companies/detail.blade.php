@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="wideget-user text-center">
					<div class="wideget-user-desc">
						<div class="wideget-user-img">
							<img class="" src="{{ asset('/uploads/companies/logos/'.$company->logo) }}" alt="{{ $company->company_name }}">
						</div>
						<div class="user-wrap">
							<h4 class="mb-1">{{ $company->company_name }}</h4>
							<h6 class="text-muted mb-4">Registration Date: {{ $company->created_at->toFormattedDateString() }}</h6>
							<div class="wideget-user-rating">
								<a href="#"><i class="fa fa-star text-warning"></i></a>
								<a href="#"><i class="fa fa-star text-warning"></i></a>
								<a href="#"><i class="fa fa-star text-warning"></i></a>
								<a href="#"><i class="fa fa-star text-warning"></i></a>
								<a href="#"><i class="fa fa-star-o text-warning mr-1"></i></a> <span>5 (3876 Reviews)</span>
							</div>
							<div class="wideget-user-icons mb-4">
								<a href="#" class="bg-facebook text-white mt-0"><i class="fa fa-facebook"></i></a>
								<a href="#" class="bg-info text-white"><i class="fa fa-twitter"></i></a>
								<a href="#" class="bg-google text-white"><i class="fa fa-google"></i></a>
								<a href="#" class="bg-dribbble text-white"><i class="fa fa-dribbble"></i></a>
							</div>
							<a href="#" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Follow</a>
							<a href="#" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i> E-mail</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="card">
			<div class="wideget-user-tab">
				<div class="tab-menu-heading">
					<div class="tabs-menu1">
						<ul class="nav">
							<li class=""><a href="#tab-51" class="active show" data-toggle="tab">Company Profile</a></li>
							<li><a href="#tab-61" data-toggle="tab" class="">Users</a></li>
							<li><a href="#tab-71" data-toggle="tab" class="">Subscriptions</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane active show" id="tab-51">
				<div class="card">
					<div class="card-body">
						<div id="profile-log-switch">
							<div class="media-heading">
								<h5><strong>{{$company->company_name}}</strong></h5>
							</div>
							<div class="table-responsive ">
								<table class="table row table-borderless">
									<tbody class="col-lg-12 col-xl-6 p-0">
										<tr>
											<td><strong>Company UUID :</strong> {{$company->company_code}}</td>
										</tr>
										<tr>
											<td><strong>Address :</strong> {{$company->address}}</td>
											<tr>
											<td><strong>Phone :</strong> {{$company->phone}} </td>
										</tr>
										</tr>
										
									</tbody>
									<tbody class="col-lg-12 col-xl-6 p-0">
										<tr>
											<td><strong>City :</strong> {{$company->city}}</td>
										</tr>
										<tr>
											<td><strong>State :</strong> {{$company->state}}</td>
										</tr>
										<tr>
											<td><strong>Country :</strong> {{$company->country}}</td>
										</tr>
										
									</tbody>
								</table>
							</div>
							<div class="row profie-img">
								<div class="col-md-12">
									<div class="media-heading">
										<h5><strong>Notes</strong></h5>
									</div>
									<p>
										Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
									<p class="mb-0">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tab-61">
				<ul class="widget-users row">
					@foreach($company->users as $user)
					<li class="col-lg-4  col-md-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-body text-center">
								<span class="avatar avatar-xxl brround cover-image" data-image-src="{{asset('/uploads/avatars/'.$user->avatar)}}"></span>
								<h4 class="h4 mb-0 mt-3">{{$user->name}}</h4>
								<p class="card-text">{{$user->group->group_name}}</p>
							</div>
							<div class="card-footer text-center">
								<div class="row user-social-detail">
									<div class="col-lg-4 col-sm-4 col-4">
										<a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
									</div>
									<div class="col-lg-4 col-sm-4 col-4">
										<a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
									</div>
									<div class="col-lg-4 col-sm-4 col-4">
										<a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="tab-pane" id="tab-71">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="table-responsive">
								<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
									<thead>
										<tr>
											<th>ID</th>
											<th>Amount</th>
											<th>Method</th>
											<th>Start Date</th>
											<th>End date</th>
											<th>Status</th>
											<!-- <th>Action</th> -->
										</tr>
									</thead>
									<tbody>
										@foreach($company->subscriptions as $subscription)
										<tr>
											<td>{{ $subscription->id }}</td>
											<td>{{ $subscription->subscription_amount }}</td>
											<td>{{ $subscription->subscription_method }}</td>
											<td>{{ $subscription->created_at->toFormattedDateString() }}</td>
											<td>{{ $subscription->created_at->addYear()->toFormattedDateString() }}</td>
											<td>
												@if( \Carbon\Carbon::now()->diffInDays($subscription->created_at->addYear()) > 0 )
													<span style="color: green">Active</span>
														<span style="color: purple">
															({{ \Carbon\Carbon::now()->diffInDays($subscription->created_at->addYear()) }} days left)
														</span>

												@else
													<span style="color: red">Expired</span>
												@endif
											</td>
											<!-- <td>
												<a href="{{ url('/super/subscriptions/editsubscription/'.$subscription->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

												<a href="{{ url('/super/companies/detail/'.$subscription->company_id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="detail"><i class="fa fa-eye"></i></a>
											</td> -->
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->
					
@endsection


