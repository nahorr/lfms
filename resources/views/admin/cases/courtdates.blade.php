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
                  <strong><i class="fas fa-calendar-alt"></i> Court Dates</strong>
                  
                </div>
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Case#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Client</th>
                          <th scope="col">Court Date</th>
                          <th scope="col">Time</th>
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
                          <td>{{ $cases->case_title }}</td>
                          <td>{{ $cases->client->last_name }}, {{ $cases->client->first_name }}</td>
                          <td>
                            <button type="button" class="btn btn-danger">
                              <strong>{{ $cases->court_date->toFormattedDateString() }}</strong>
                            </button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning">
                              <strong>{{ $cases->court_date->format('g:i A') }}</strong>
                            </button>
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
