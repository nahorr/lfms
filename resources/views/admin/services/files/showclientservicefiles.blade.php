@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-file"></i> File For Service #: {{$clientservice->service_number}} - Client Name: {{$client->first_name}} {{$client->last_name}}</h3>
        <a href="{{route('admin.services.clientservices', [$company->id, $service->id])}}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-arrow-left"></i>
          </span> <strong>Back</strong>
        </a>
      </div>
      <div class="card-body">
			<div class="table-responsive">
			  <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
			    <thead>
			      <tr>
			      	<th>#</th>
			        <th>Files</th>
			        <th>Delete</th>  
			      </tr>
			      </tr>
			    </thead>
			    <tbody>
			    
			      @for ($i = 0; $i < count(json_decode($clientservice->service_files)); $i++)
				      <tr>
				      	<td>{{ $i + 1}}</td>
				        <td>
				        	<a href="{{url('/uploads/companies/services/'.$company->id)}}/{{json_decode($clientservice->service_files)[$i]}}" target="_blank" class="btn-sm btn btn-outline-info">
								<i class="fa fa-download"></i> {{json_decode($clientservice->service_files)[$i]}}
							</a>
						</td>
				        <td>
				        	<a href="{{route('admin.services.delete.clientservicefile', [$clientservice->id, json_decode($clientservice->service_files)[$i]])}}" class="btn btn-sm btn-danger">
				        		<i class="fa fa-trash"></i>
				        	</a>
				        </td>
				      </tr>
			      @endfor

			    </tbody>
			  </table>
			</div>
      </div>
    </div>
  </div>
</div>
<!-- ROW-4 CLOSED-->
@endsection