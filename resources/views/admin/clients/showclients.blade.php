@extends('layouts.app_user')

@section('content')
<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-users"></i> Clients Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>Client #</th>
                <th>Name</th>
                <th># of Cases</th>
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
                <td>{{ $client->client_cases->count() }}</td>
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
