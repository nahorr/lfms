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
                <th scope="col">Name</th>
                  <th>Email</th>
                  <th>Phone#</th>
                  <th>Address</th>
                  <th>Note</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr>
                <td>
                  <a class="btn btn-light" href="#" role="button" data-toggle="tooltip" data-placement="top" title="Open a new file" id="addNewCase-{{$client->id}}">
                    {{ $client->client_number }} <i class="fas fa-folder-open" style="color: Tomato;"></i>
                  </a>
         
                </td>
                @include('admin.cases.newCaseModal')
                <script type="text/javascript">
                  $('#addNewCase-{{$client->id}}').on('click', function(e){
                     e.preventDefault();
                    $('#addNewCaseModal-{{ $client->id }}').modal('show');
                  })
                </script>
                <td>
                  <a class="btn btn-light" href="{{ url('/admin/cases/showallclientcases/'.$client->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="View all {{ $client->last_name }}, {{ $client->first_name }}'s cases">
                    {{ $client->client_cases->count() }} <i class="fas fa-balance-scale" style="color: Tomato;"></i> cases
                  </a>
                </td>
                <td>{{ $client->last_name }}, {{ $client->first_name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>
                  <a class="btn btn-light" href="#" role="button" data-toggle="tooltip" data-placement="top" title="{{ $client->address }}, {{ $client->address_2 }}, {{ $client->city }}, {{ $client->state }}, {{ $client->country }}">
                   <i class="fas fa-caret-right" style="color: Tomato;"></i>{{ $client->state }}
                  </a>
                </td>
                <td>
                  <a class="btn btn-light" href="#" role="button" data-toggle="tooltip" data-placement="top" title="{{ $client->client_note }}"><i class="fas fa-caret-right" style="color: Tomato;"></i>
                    {{ str_limit($client->client_note, 10) }}
                  </a>
                </td>
                <td>

                  {{ @$client->created_at->toFormatteddateString() }}
                </td>
                <td>
                  <button type="button" class="btn btn-primary" id="editClient-{{$client->id}}">Edit</button>
                </td>
                @include('admin.clients.editClientModal')
                <script type="text/javascript">
                  $('#editClient-{{$client->id}}').on('click', function(e){
                     e.preventDefault();
                    $('#editClientModal-{{$client->id}}').modal('show');
                  })
                </script>
                <td>
                  <a class=" btn btn-danger" href="{{url('admin/clients/deleteclient/'.$client->id)}}" role="button" onclick="return confirm('Are you sure you want to Delete this user?')"><i class="fa fa-trash" style="color: #FFF;"></i> Delete</a>
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
