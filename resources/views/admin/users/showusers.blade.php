@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10">Users Table</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comapny</th>
                <th>Role</th>
                <th>Verified</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companyusers as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->company->company_name }}</td>
                <td>@if($user->is_superadmin == 1)
                    Super
                  @elseif($user->is_admin == 1)
                    Admin
                  @else
                    User
                  @endif
                </td>
                <td>
                  @if($user->email_verified_at != NULL)
                    Verified
                  @else
                    Not Verified
                  @endif
                </td>
                <td>{{ $user->created_at }}</td>
                <td>
                  @if($user->is_superadmin !=1)
                  <a href="{{ url('/super/users/delete/'.$user->id) }}" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure you want to Delete this user?')">
                    <i class="fa fa-trash-o"></i>
                  </a>

                  <a href="" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
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
