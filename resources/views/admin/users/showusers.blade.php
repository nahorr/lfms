@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10">Company User/Employees Table</h3>
        <a href="{{ url('/admin/users/newuser/'.Auth::user()->company_id) }}" class="btn btn-danger btn-icon text-white mr-2" style="margin: auto;">
            <span>
                <i class="fe fe-user"></i>
            </span> <strong>Add an Employee OR a Lawyer</strong>
        </a>
      </div>

      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This table contains all users(<span class="bg-warning">Employees, Assistants, Lawyers, etc</span>) for your company. To add a new user, click on "<span class="bg-warning">Add an Employee OR a Lawyer</span>" above.
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="datatabel table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comapny</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companyusers as $key=>$user)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->company->company_name }}</td>
                <td>{{ $user->group->group_name}}</td>
                <td>
                  @if($user->deleted_at != Null)
                    <span style="color: red">Deleted</span>
                  @else
                    <span style="color: green">Active</span>
                  @endif
                </td>
                <td>{{ $user->created_at->toFormattedDateString()}}</td>
                  <td>
                    <a href="{{url('/admin/users/edituser/'.$user->company_id)}}/{{$user->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="fa fa-pencil"></i></a>

                    @if($user->group_id !=2)
                      @if($user->deleted_at === Null)
                        <a href="{{ url('/admin/users/delete/'.$user->id) }}" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Delete User">
                          <i class="fa fa-trash-o"></i>     
                        </a>
                      @else
                        <a href="{{ url('/admin/users/restore/'.$user->id) }}" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Restore User">
                          <i class="mdi mdi-restore"></i>
                        </a>

                        <a href="{{ url('/admin/users/deleteforever/'.$user->id) }}" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Delete User Forever">
                          <i class="mdi mdi-delete-forever"></i>
                        </a>
                      @endif
                    @endif
                     
                  </td>
                </tr>
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
