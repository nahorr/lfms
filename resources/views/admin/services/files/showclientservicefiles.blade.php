@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-file"></i> File For Service #: {{$clientservice->service_number}} - Client Name: {{$client->first_name}} {{$client->last_name}}</h3>
        <a href="http://127.0.0.1:8000/admin/templates/category/newtemplate/2/1" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Add/Update File</strong>
        </a>
      </div>
      <div class="card-body">
			<div class="table-responsive">
			  <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
			    <thead>
			      <tr>
			      	<th>#</th>
			        <th>Files</th>
			        <th>Action</th>  
			      </tr>
			      </tr>
			    </thead>
			    <tbody>
			    
			      @for ($i = 0; $i < count(json_decode($clientservice->service_files)); $i++)
				      <tr>
				      	<td>{{ $i + 1}}</td>
				        <td>
				        	<a href="#">
								<i class="fa fa-download"></i> {{json_decode($clientservice->service_files)[$i]}}
							</a>
						</td>
				        <td>
				        	<a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
				        	<a href="" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
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