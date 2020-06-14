@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
          @include('flash::message')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-users"></i> Company Users</strong>
                </div>
                
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Company</th>
                          <th scope="col">Date Added</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($users->where('company_id', Auth::user()->company_id) as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>
                            {{ $user->name }}
                            @if($user->is_admin == 1)
                              <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Administrator"></i>
                            @endif
                          </td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->company->company_name }}</td>
                          <td>{{ $user->created_at->toFormatteddateString() }}</td>
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
