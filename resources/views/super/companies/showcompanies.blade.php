@extends('layouts.app_user')
@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
	<div class="col-md-12 col-lg-12">
		@include('flash::message')
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mr-10"><i class="fa fa-building-o text-white"></i> <i class="fa fa-building-o"></i> Campanies Table</h3>
				<a href="{{ url('/super/companies/newcompany') }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
		          <span>
		              <i class="fa fa-plus"></i>
		          </span> <strong>New Company</strong>
		        </a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>State</th>
								<th>City</th>
								<th>country</th>
								<th>Deleted</th>
								<th>Created</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($companies as $company)
							<tr>
								<td>{{ $company->id }}</td>
								<td>{{ $company->company_name }}</td>
								<td>{{ $company->address }}</td>
								<td>{{ $company->state }}</td>
								<td>{{ $company->city }}</td>
								<td>{{ $company->country }}</td>
								<td>
									@if($company->deleted_at != Null)
									 <span style="color: red">Deleted</span>
									@else
									 <span style="color: green">Active</span>
									@endif
								</td>
								<td>{{ $company->created_at->toFormatteddateString() }}</td>
								<td>
									@if($company->deleted_at != Null)
										<a href="{{ url('/super/companies/undelete/'.$company->id) }}" id="undelete-company-{{$company->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete" 
											onclick="event.preventDefault();
													 return confirm('Are you sure you want to Delete this user?');
	                                        		 document.getElementById("undelete-company-{{$company->id}}").submit();">
											<i class="fa fa-recycle"></i>
										</a>
										<form id="undelete-company-{{$company->id}}" action="{{ url('/super/companies/undelete/'.$company->id) }}" method="POST" style="display: none;">@csrf</form> 
									@else
										<a href="{{ url('/super/companies/delete/'.$company->id) }}" id="delete-company-{{$company->id}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete" 
										onclick="event.preventDefault();
												 return confirm('Are you sure you want to Delete this user?');
                                        		 document.getElementById("delete-company-{{$company->id}}").submit();">
										<i class="fa fa-trash-o"></i>
									
									</a>
										<form id="delete-company-{{$company->id}}" action="{{ url('/super/companies/delete/'.$company->id) }}" method="POST" style="display: none;">@csrf</form> 
									@endif                       
									<a href="{{url('/super/companies/editcompany/'.$company->id)}}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

									<a href="{{ url('/super/companies/detail/'.$company->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="detail"><i class="fa fa-eye"></i></a>
									
								</td>
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


