@extends('layouts.app')
@section('content')

<!-- ROW-1 -->
<div class="row mt-xl-4">
	<div class="col-md-12">
		<div class="card  banner">
			<div class="card-body">
				<div class="row">
					<div class="col-xl-3 col-lg-2 text-center">
						<img src="../../assets/images/pngs/dash2.png" alt="img" class="w-95">
					</div>
					<div class="col-xl-9 col-lg-10 pl-lg-0">
						<div class="row">
							<div class="col-xl-7 col-lg-6">
								<div class="text-left text-white mt-xl-4">
									<h3 class="font-weight-semibold">Congratulations Steven</h3>
									<h4 class="font-weight-normal">You are Reached your targeted milestone</h4>
									<p class="mb-lg-0 text-white-50">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
								</div>
							</div>
							<div class="col-xl-5 col-lg-6 text-lg-center mt-xl-4">
								<h5 class="font-weight-semibold mb-1 text-white">Clicks & Conversions Today</h5>
								<h2 class="display-2 mb-3 number-font text-white">90%</h2>
								<div class="btn-list mb-xl-0">
									<a href="#" class="btn btn-dark mb-xl-0">Sign Up</a>
									<a href="#" class="btn btn-white mb-xl-0" id="skip">Contact Us</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ROW-1 End-->

<!-- Row1 -->
<div class="row">
	<div class="col-xl-3 col-sm-6">
		<div class="card">
			<div class="card-body text-center">
				<div class="d-flex mb-0">
					<span class="brround align-self-center avatar-lg br-3 cover-image bg-orange">
						<i class="fe fe-refresh-ccw"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<p class="text-muted mb-2">Total Clients</p>
						<h2 class="mb-0 number-font">7,896</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6">
		<div class="card overflow-hidden">
			<div class="card-body text-center">
				<div class="d-flex mb-0">
					<span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary">
						<i class="fe fe-bar-chart text-white"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<p class="text-muted mb-2">Total Cases</p>
						<h2 class="mb-0 number-font">56%</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6">
		<div class="card overflow-hidden">
			<div class="card-body text-center">
				<div class="d-flex mb-0">
					<span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary1">
						<i class="fe fe-dollar-sign text-white"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<p class="text-muted mb-2">Total Contracts</p>
						<h2 class="mb-0 number-font">$14,675</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6">
		<div class="card overflow-hidden">
			<div class="card-body text-center">
				<div class="d-flex mb-0">
					<span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
						<i class="fe fe-eye text-white"></i>
					</span>
					<div class="svg-icons text-right ml-auto">
						<p class="text-muted mb-2">Total Lawyers</p>
						<h2 class="mb-0 number-font">3,768</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Row1 CLOSED -->


@endsection