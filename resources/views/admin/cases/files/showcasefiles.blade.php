@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-file"></i> File For case:  #{{$case->case_number}} - Client Name: {{$client->first_name}} {{$client->last_name}}</h3>
        <a href="http://127.0.0.1:8000/admin/templates/category/newtemplate/2/1" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Addd a new file fo rthis case</strong>
        </a>
      </div>
      <div class="card-body">
			<div class="table-responsive">
			  <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
			    <thead>
			      <tr>
			        <th>Case#</th>
			        <th>Client</th>
			        <th>Case Files</th>
			        <th>Action</th>  
			      </tr>
			      </tr>
			    </thead>
			    <tbody>
			      @for ($i = 0; $i < count(json_decode($case->case_file)); $i++)
			      <tr>
			        <td>{{ $case->case_number}}</td>
			        <td>{{ $client->first_name}} {{ $client->last_name}}</td>
			        <td>
			          <a href="{{ asset('/uploads/companies/cases/'.$case_file_folder)}}/{{json_decode($case->case_file)[$i] }}">
						<i class="fa fa-download"></i> {{json_decode($case->case_file)[$i]}}
					</a>
			        </td>
			        <td>
			        	<i class="fa fa-trash"></i>
			        	<i class="fa fa-pencil"></i>
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