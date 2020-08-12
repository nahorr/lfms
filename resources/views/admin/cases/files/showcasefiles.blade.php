@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-file"></i> File(s) For case:  <span class="text-danger">#{{$case->case_number}}</span> - Client Name: <span class="text-danger">{{$client->first_name}} {{$client->last_name}}</span></h3>
        <a href="http://127.0.0.1:8000/admin/templates/category/newtemplate/2/1" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Addd a new file to this case</strong>
        </a>
      </div>
      <div class="card-body">
			<div class="table-responsive">
			  <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
			    <thead>
			      <tr>
			      	<th>#</th>
			        <th>Case#</th>
			        <th>Client</th>
			        <th>Case Files</th>
			        <th>Action</th>  
			      </tr>
			      </tr>
			    </thead>
			    <tbody>
			    @if($case->case_files)
				      @for ($i = 0; $i < count(json_decode($case->case_files)); $i++)
				      <tr>
				      	<td>{{ $i + 1}}</td>
				        <td>{{ $case->case_number}}</td>
				        <td>{{ $client->first_name}} {{ $client->last_name}}</td>
				        <td>
				          <a href="{{ asset('/uploads/companies/cases/'.json_decode($case->case_files)[$i])}}" class="btn-sm btn btn-outline-info">
							<i class="fa fa-download"></i> {{json_decode($case->case_files)[$i]}}
						</a>
				        </td>
				        <td>
				     	
    	                  <a href="{{ url('/admin/cases/edit',[$company->id, $case->id]) }}" class="btn btn-blue btn-sm" data-toggle="tooltip" data-original-title="Edit">
    	                    <i class="fa fa-pencil"></i>
    	                  </a>

    	                  <a href="{{ url('/admin/users/delete/'.$case->id) }}" id="delete_case-{{$case->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete">
    	                    <i class="fa fa-trash-o"></i>   
    	                  </a>
        	              
				        </td>
				      </tr>
				      @endfor
				@endif
			    </tbody>
			  </table>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- ROW-4 CLOSED-->
@endsection