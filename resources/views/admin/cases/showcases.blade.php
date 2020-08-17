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
          </span> <strong>Add a New Case</strong>
        </a>
      </div>
      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This table shows all cases for your company. To add a new case, click on "<span class="bg-warning">Add a New Case</span>" above. To show all files under a case, click on the botton showing the number of files under "# of Case Files" column. Use the "ACTION" column to add, edit, or delete a case. You can also use the search feature to search for a particular case based on Dates, Client Name, Case number, and so on.
        </div>
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
                <td>{{ @$case->user->name}}</td>
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

                  <a href="{{ url('/admin/cases/delete/'.$case->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to Delete this case?');">
                    <i class="fa fa-trash-o"></i>   
                  </a>
                @else
                  
                  <a href="{{ url('/admin/cases/restore/'.$case->id) }}" class="btn btn-orange btn-sm" data-toggle="tooltip" data-original-title="Restore this Case">
                    <i class="mdi mdi-restore"></i>
                  </a>

                  <a href="{{ url('/admin/cases/deleteforever/'.$case->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete">
                    <i class="mdi mdi-delete-forever"></i>   
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
