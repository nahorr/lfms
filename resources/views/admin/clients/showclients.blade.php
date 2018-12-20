@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
          @include('flash::message')
          @include('admin.form_error')
          @include('admin.includes.dashboard')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-user-plus"></i> Clients</strong>
                  <button type="button" class="btn btn-warning" id="addNewClient">New Client</button>
                </div>
                @include('admin.clients.newClientModal')
                <script type="text/javascript">
                  $('#addNewClient').on('click', function(e){
                     e.preventDefault();
                    $('#addNewClientModal').modal('show');
                  })
                </script>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Client#</th>
                          <th scope="col">
                            <a class="btn btn-light" href="#" role="button" data-toggle="tooltip" data-placement="top" title="View All Cases">
                              <i class="fas fa-balance-scale" style="color: Tomato;"></i>Cases({{ $all_cases->count() }} )
                            </a>
                          </th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone#</th>
                          <th scope="col">Address</th>
                          <th scope="col">Note</th>
                          <th scope="col">Added</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
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
                              $('#addNewCaseModal').modal('show');
                            })
                          </script>
                          <td>
                            <a class="btn btn-light" href="{{ url('/admin/cases/showallclientcases/'.$client->id) }}" role="button" data-toggle="tooltip" data-placement="top" title="View all client cases">
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
                          <td>{{ $client->created_at->toFormatteddateString() }}</td>
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
</div>
@endsection
