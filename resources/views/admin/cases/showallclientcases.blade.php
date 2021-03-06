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
                  <strong><i class="fas fa-balance-scale"></i> {{ $client->last_name }}, {{ $client->first_name }}'s Cases</strong>
                  <button type="button" class="btn btn-warning" id="addNewClientCase-{{$client->id}}">Open a New File</button>
                </div>
                @include('admin.cases.newClientCaseModal')
                <script type="text/javascript">
                  $('#addNewClientCase-{{$client->id}}').on('click', function(e){
                     e.preventDefault();
                    $('#addNewClientCaseModal-{{$client->id}}').modal('show');
                  })
                </script>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th scope="col">Case#</th>
                          <th scope="col">Court Date</th>
                          <th scope="col">Outcome</th>
                          <th scope="col">Assigned To</th>
                          <th scope="col">Date Added</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($allclientcases as $key=>$cases)
                        <tr>
                          <td>
                            {{ $key+1 }}
                          </td>
                          <td>
                            <a class="btn btn-success" href="#" role="button" data-toggle="tooltip" data-placement="top" title="View Case Details">
                              {{ $cases->case_number }} <i class="fas fa-info-circle" style="color: White;"></i> 
                            </a>
                          </td>
                          <td>
                              @if(!empty($cases->court_date))
                                {{ $cases->court_date->toDayDateTimeString() }}
                              @else
                                Not Date yet
                              @endif
                          </td>
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
