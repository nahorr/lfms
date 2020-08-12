@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10">Cases Table</h3>
        <a href="{{ url('/admin/cases/addnewcase/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>New Case</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>Case#</th>
                <th>Client</th>
                <th># of Case Files</th>
                <th>Court Date</th>
                <th>Assigned To</th>
                <th>Created</th>
                <th>Status</th>    
                <th>Action</th>  
              </tr>
              </tr>
            </thead>
            <tbody>
              @foreach($companycases as $case)
              <tr>
                <td>{{ $case->case_number }}</td>
                <td>{{ $case->client->first_name}} {{ $case->client->last_name }}</td>
                <td>
                  @if($case->case_files)
                    <a href="{{ url('/admin/cases/files/showcasefiles', [$case->id, $case->company_id, $case->client_id]) }}" class="btn-sm btn btn-outline-info" target="_blank">
                      {{ count(json_decode($case->case_files))}} <i class="fa fa-file"></i> files
                    </a>
                  @else
                    <span class="text-danger">No case File</span>
                  @endif

                </td>
                <td>{{ $case->court_date->toFormattedDateString() }}</td>
                <td>{{ $case->user->name}}</td>
                <td>{{ $case->created_at->toFormattedDateString()}}</td>
                <td>
                    @if($case->deleted_at != Null)
                      <span style="color: red">Deleted</span>
                    @else
                      <span style="color: green">Active</span>
                    @endif
                </td>
                <td>
                @if($case->deleted_at === Null)
                  <a href="{{ url('/admin/cases/edit',[$company->id, $case->id]) }}" class="btn btn-blue btn-sm" data-toggle="tooltip" data-original-title="Edit">
                    <i class="fa fa-pencil"></i>
                  </a>

                  <a href="{{ url('/admin/users/delete/'.$case->id) }}" id="delete_case-{{$case->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i>   
                  </a>
                @else
                  
                  <a href="" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit">
                    <i class="fa fa-pencil"></i>
                  </a>

                  <a href="{{ url('/admin/users/delete/'.$case->id) }}" id="delete_case-{{$case->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i>   
                  </a>
                @endif
                
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
