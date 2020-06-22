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
                <td>{{ $case->id }}</td>
                <td>{{ $case->case_number }}</td>
                <td>{{ $case->client->first_name}} {{ $case->client->last_name }}</td>
                <td>{{ $case->court_date }}</td>
                <td>{{ $case->user->name}}</td>
                <td>{{ $case->created_at}}</td>
                <td>{{ $case->deleted_at}}</td>
                <td>
                @if($user->group_id !=2)
                <a href="{{ url('/admin/users/delete/'.$case->id) }}" id="delete_case-{{$case->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i>   
                </a>
                <form id="delete_case-{{$case->id}}" action="{{ url('/admin/cases/delete/'.$case->id) }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
                <a href="" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                
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
