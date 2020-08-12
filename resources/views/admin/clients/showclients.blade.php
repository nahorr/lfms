@extends('layouts.app_user')

@section('content')
<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-users"></i> Clients Table</h3>
        <a href="{{ url('/admin/clients/newclient/'.Auth::user()->company_id) }}" class="btn btn-danger btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Add New Client</strong>
        </a>
      </div>

      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This table contains all your clients - (<span class="bg-warning">for both cases and service</span>). To add a new client, click on "<span class="bg-warning">Add New Client</span>" above.
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>Client #</th>
                <th>Name</th>
                <th>Cases</th>
                <th>Services</th>
                <th>Email</th>
                <th>Phone#</th>
                <th>Created</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <td>{{ $client->client_number }}</td>
                <td>{{ $client->last_name }}, {{ $client->first_name }}</td>
                <td>
                  {{ $client->client_cases->count() }} Cases
                  <a href="{{ url('/admin/cases/addnewcase/'.Auth::user()->company_id) }}/{{$client->id}}" id="delete_client-{{$client->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Add a case for this client">
                    <i class="fa fa-plus"></i>
                    
                  </a>
                </td>
                <td>
                  {{ $client->client_services->count() }} Services
                  <a href="{{ url('/admin/services/newclientservice/'.Auth::user()->company_id) }}/{{$client->id}}" id="delete_client-{{$client->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Add a service for this client">
                    <i class="fa fa-plus"></i>
                    
                  </a>
                </td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ @$client->created_at->toFormatteddateString() }}</td>
                <td>
                  @if($client->deleted_at != Null)
                    <span style="color: red">Deleted</span>
                  @else
                    <span style="color: green">Active</span>
                  @endif
                </td>             
                <td>
                  @if($client->deleted_at === Null)
                    <a href="{{ url('/admin/clients/edit', [Auth::user()->company_id, $client->id]) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Edit">
                      <i class="fa fa-pencil"></i>
                    </a>

                    <a href="{{ url('/admin/clients/delete/'.$client->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to Delete this client?');
                      "><i class="fa fa-trash-o"></i>  
                    </a>
                    
                    <!-- <a href="{{ url('/admin/clients/view/'.$client->id) }}" class="btn btn-orange btn-sm" data-toggle="tooltip" data-original-title="View All Client Cases">
                      <i class="fa fa-eye"></i>
                    </a> -->
                  @else
                    <a href="{{ url('/admin/clients/restore/'.$client->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Restore" onclick="return confirm('Are you sure you want to Restore this client?');
                      "><i class="mdi mdi-restore"></i>  
                    </a>

                    <a href="{{ url('/admin/clients/deleteforever/'.$client->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete Forever" onclick="return confirm('Are you sure you want to Delete this client Forever?');
                      "><i class="mdi mdi-delete-forever"></i>  
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
