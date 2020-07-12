@extends('layouts.app_user')
@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
	<div class="col-md-12 col-lg-12">
		@include('flash::message')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mr-10"><i class="fa fa-dollar"></i> Subscriptions Table</h3>
				<a href="{{ url('/super/subscriptions/newsubscription') }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
		          <span>
		              <i class="fa fa-plus"></i>
		          </span> <strong>New Manual Subscription</strong>
		        </a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
						<thead>
							<tr>
								<th>ID</th>
								<th>company</th>
								<th>Amount</th>
								<th>Method</th>
								<th>Start Date</th>
								<th>End date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($subscriptions as $key =>$subscription)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $subscription->company->company_name }}</td>
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
								<td>
									<a href="{{ url('/super/subscriptions/editsubscription/'.$subscription->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

									<a href="{{ url('/super/companies/detail/'.$subscription->company_id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="detail"><i class="fa fa-eye"></i></a>
								</td>
								<!-- <td>
									@if($subscription->deleted_at != Null)
										<a href="{{ url('/super/subscriptions/undelete/'.$subscription->id) }}" id="undelete_subscription-{{$subscription->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="unDelete" 	
											onclick="
													 event.preventDefault();
	                                                 document.getElementById( "undelete_subscription-{{$subscription->id}} ").submit();
	                                                 return confirm('Are you sure you want to Delete this subscription?')">
	                                            <i class="fa fa-recycle"></i>
										</a>
	                                    <form id="undelete_subscription-{{$subscription->id}}" action="{{ url('/super/subscriptions/undelete/'.$subscription->id) }}" method="POST" style="display: none;">
		                                    @csrf
		                                </form>
	                                @else
	                                	<a href="{{ url('/super/subscriptions/delete/'.$subscription->id) }}" id="delete_subscription-{{$subscription->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete" 	
											onclick="
													 event.preventDefault();
	                                                 document.getElementById( "delete_subscription-{{$subscription->id}} ").submit();
	                                                 return confirm('Are you sure you want to Delete this subscription?')">
	                                            <i class="fa fa-trash"></i>
										</a>
	                                    <form id="delete_subscription-{{$subscription->id}}" action="{{ url('/super/subscriptions/delete/'.$subscription->id) }}" method="POST" style="display: none;">
		                                    @csrf
		                                </form>
		                            @endif

									<a href="{{ url('/super/subscriptions/editsubscription/'.$subscription->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
									
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
<!-- ROW-4 CLOSED-->
@endsection


