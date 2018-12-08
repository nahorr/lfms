@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
          @include('flash::message')
          @include('admin.form_error')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-balance-scale"></i> Cases</strong>
                  <button type="button" class="btn btn-warning" id="addNewClient">New Case</button>
                </div>
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Case#</th>
                          <th scope="col">Client</th>
                          <th scope="col">History</th>
                          <th scope="col">Court Date</th>
                          <th scope="col">Outcome</th>
                          <th scope="col">Assigned To</th>
                          <th scope="col">Date Added</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($client_cases as $cases)
                        <tr>

                          <td>
                            <a class="btn btn-light" href="#" role="button" data-toggle="tooltip" data-placement="top" title="Open a new file">
                              {{ $cases->case_number }} <i class="fas fa-folder-open" style="color: Tomato;"></i>
                            </a>
                          </td>
                          <td>{{ $cases->client->last_name }}, {{ $cases->client->first_name }}</td>
                          <td>
                            <button type="button" class="btn btn-primary" id="viewCaseHistory-{{$cases->id}}">View History</button>
                          </td>
                          <td>{{ $cases->court_date->toDayDateTimeString() }}</td>
                          <td>{{$cases->outcome}}</td>
                          <td>{{ $cases->assigned_to }}</td>
                          <td>{{ $cases->created_at->toFormatteddateString() }}</td>
                          <td>
                            <button type="button" class="btn btn-primary" id="editCase-{{$cases->id}}">Edit</button>
                          </td>
                          
                          <td>
                            <a class=" btn btn-danger" href="{{url('admin/cases/deletecase/'.$cases->id)}}" role="button" onclick="return confirm('Are you sure you want to Delete this case?')"><i class="fa fa-trash" style="color: #FFF;"></i> Delete</a>
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
