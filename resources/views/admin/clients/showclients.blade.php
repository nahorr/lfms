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
                  <i class="fa fa-pencil"></i>
                  <i class="fa fa-trash"></i>
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
