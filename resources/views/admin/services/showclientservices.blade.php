@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10">Client {{$service->service_name}} Table</h3>
        <a href="{{ url('/admin/services/addclientservice/'.Auth::user()->company_id) }}/{{$service->id}}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>New Client {{$service->service_name}}</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>Service#</th>
                <th>Title</th>
                <th>Client</th>
                <th># of Files</th>
                <th>Effective Date</th>
                <th>Assigned To</th>
                <th>Created</th>  
                <th>Status</th>  
                <th>Action</th>  
              </tr>
              </tr>
            </thead>
            <tbody>
              @foreach($clientservices as $clientservice)
              <tr>
                <td>{{ $clientservice->service_number }}</td>
                <td>{{ $clientservice->service_title }}</td>
                <td>{{ $clientservice->client->first_name}} {{ $clientservice->client->last_name }}</td>
                <td>
                  @if($clientservice->service_files != Null)
                    <a href="{{ url('/admin/services/files/showclientservicefiles', [$clientservice->id, $clientservice->company_id, $clientservice->service_id, $clientservice->client_id]) }}">
                      {{ count(json_decode($clientservice->service_files)) }} <i class="fa fa-file"></i> files
                    </a>
                  @else
                    <a href="#">
                      0 <i class="fa fa-file"></i> files
                    </a>
                  @endif
                </td>
                <td>{{ $clientservice->effective_date->toFormattedDateString() }}</td>
                <td>{{ $clientservice->user->name}}</td>
                <td>{{ $clientservice->created_at->toFormattedDateString()}}</td>
                <td>
                    @if($clientservice->deleted_at != Null)
                      <span style="color: red">Deleted</span>
                    @else
                      <span style="color: green">Active</span>
                    @endif
                </td>
                <td>
                
                  <a href="{{ url('/admin/users/delete/'.$clientservice->id) }}" id="delete_clientservice-{{$clientservice->id}}" class="btn btn-default btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o text-white"></i>   
                  </a>
                  <form id="delete_clientservice-{{$clientservice->id}}" action="{{ url('/admin/clientservices/delete/'.$clientservice->id) }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  
                  <a href="" class="btn btn-default btn-sm btn-warning" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-white"></i></a>
                
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
