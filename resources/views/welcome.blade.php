@extends('layouts.app')
@section('content')

<!--Content-area open-->
<div class="content-area">
		<div class="container">
			<div class="page-header">
				<div>
					<h1 class="page-title">MYLAWYA</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Law Firm management System</a></li>
						
					</ol>
				</div>
				<div class="ml-auto pageheader-btn">
					<a href="#" class="btn btn-primary btn-icon text-white mr-2">
						<span>
							<i class="fe fe-search"></i>
						</span> Find a Lawyer or Law Firm
					</a>
				</div>
			</div>
			<!-- ROW-1 -->
			<div class="row">
				<div class="col-md-12">
					<div class="card  banner">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-3 col-lg-2 text-center">
									<img src="{{ asset('/assets/images/pngs/dash4.png') }}" alt="img" class="w-95">
								</div>
								<div class="col-xl-9 col-lg-10 pl-lg-0">
									<div class="row">
										<div class="col-xl-12 col-lg-12">
											<div class="text-left text-white mt-xl-4">
												<h3 class="font-weight-semibold">Welcome to LAWYA</h3>
												<h4 class="font-weight-normal">A law firm managemnet system by Nahorr Analytics</h4>
												<p class="mb-lg-0 text-white-50">This system was developed with sucess in mind and eas of use. Itallowas you focus on what is important... Winning Cases and providing quality services to your esteemed clients.</p>
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
			<h4 class="card-title mt-4">Features</h4>
			<!-- ROW-1 OPEN -->
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3 ">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class=" text-center  mb-4 text-orange"><i class="icon icon-people"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Manage Lawyers</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class=" text-center text-secondary mb-4"><i class="icon icon-clock"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Manage Cases</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class=" text-center text-secondary1 mb-4"><i class="fa fa-building-o"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Manage Services</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class="text-center text-warning mb-4"><i class="icon icon-action-redo"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Mange case Files</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class="text-center text-warning mb-4"><i class="icon icon-action-redo"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Court Date Alerts</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class="text-center text-warning mb-4"><i class="icon icon-action-redo"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Service Templates</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class="text-center text-warning mb-4"><i class="icon icon-action-redo"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Easy to Use</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
					<div class="card service">
						<div class="card-body">
							<div class="item-box text-center">
								<div class="text-center text-warning mb-4"><i class="icon icon-action-redo"></i></div>
								<div class="item-box-wrap">
									<h5 class="mb-2">Affordable</h5>
									<p class="text-muted mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ROW-1 CLOSE -->

			<h4 class="card-title mt-4">Pricing</h4>
			<!-- ROW-2 OPEN -->
			<div class="row">
				<div class="col-sm-6 col-xl-3">
					<div class="panel price panel-color">
						<div class="panel-heading bg-primary p-0 text-center">
							<h3>Monthly</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead"><strong>₦5000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><strong> 2 Free</strong> Domain Name</li>
							<li class="list-group-item"><strong>3 </strong> One-Click Apps</li>
							<li class="list-group-item"><strong> 1 </strong> Databases</li>
							<li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
							<li class="list-group-item"><strong> 24/7</strong> support</li>
						</ul>
						<div class="panel-footer text-center">
							<a class="btn btn-lg btn-primary" href="#">Purchase Now!</a>
						</div>
					</div>
				</div><!-- COL-END -->
				<div class="col-sm-6 col-xl-3">
					<div class="panel price panel-color">
						<div class="panel-heading bg-warning  p-0 text-center">
							<h3>3 Monthly</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead"><strong>₦10000</strong> </p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><strong> 3 Free</strong> Domain Name</li>
							<li class="list-group-item"><strong>4 </strong> One-Click Apps</li>
							<li class="list-group-item"><strong> 2 </strong> Databases</li>
							<li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
							<li class="list-group-item"><strong> 24/7</strong> support</li>
						</ul>
						<div class="panel-footer text-center">
							<a class="btn btn-lg btn-warning" href="#">Purchase Now!</a>
						</div>
					</div>
				</div><!-- COL-END -->
				<div class="col-sm-6 col-xl-3">
					<div class="panel price panel-color">
						<div class="panel-heading bg-success p-0 text-center">
							<h3>6 Monthly</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead"><strong>₦15000</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><strong> 5 Free</strong> Domain Name</li>
							<li class="list-group-item"><strong>8 </strong> One-Click Apps</li>
							<li class="list-group-item"><strong> 2 </strong> Databases</li>
							<li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
							<li class="list-group-item"><strong> 24/7</strong> support</li>
						</ul>
						<div class="panel-footer text-center">
							<a class="btn btn-lg btn-success" href="#">Purchase Now!</a>
						</div>
					</div>
				</div><!-- COL-END -->
				<div class="col-sm-6 col-xl-3">
					<div class="panel price panel-color">
						<div class="panel-heading bg-danger p-0 text-center">
							<h3>Yearly</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead"><strong>₦20000 </strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><strong> 4 Free</strong> Domain Name</li>
							<li class="list-group-item"><strong>6 </strong> One-Click Apps</li>
							<li class="list-group-item"><strong> 2 </strong> Databases</li>
							<li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
							<li class="list-group-item"><strong> 24/7</strong> support</li>
						</ul>
						<div class="panel-footer text-center">
							<a class="btn btn-lg btn-danger" href="#">Purchase Now!</a>
						</div>
					</div>
				</div><!-- COL-END -->
			</div>
			<!-- ROW-1 CLOSED -->
			
		</div>
		<!-- ROW-3 CLOSED -->
</div>
<!-- CONTAINER CLOSED-->


@endsection