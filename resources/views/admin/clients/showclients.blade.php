@extends('layouts.app_user')

@section('content')
<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-users"></i> Clients Table</h3>
        <a href="{{ url('/admin/clients/newclient/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>New Client</strong>
        </a>
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
                  <a href="{{ url('/admin/services/newclientservice/'.Auth::user()->company_id) }}/{{$client->id}}" id="delete_client-{{$client->id}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Add a case for this client">
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
                  <i class="fa fa-pencil"></i>
                  <a href="{{ url('/admin/clients/delete/'.$client->id) }}" id="delete_client-{{$client->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete" 
                    onclick="
                    return confirm('Are you sure you want to Delete this client?')
                         event.preventDefault();
                         document.getElementById( "delete_client-{{$client->id}} ").submit();
                    "><i class="fa fa-trash-o"></i>
                    
                  </a>
                  <form id="delete_client-{{$client->id}}" action="{{ url('/admin/clients/delete/'.$client->id) }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  <i class="fa fa-eye"></i>
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
