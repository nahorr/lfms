@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10">Employees Table</h3>
        <a href="{{ url('/admin/lawyers/newlawyer/'.Auth::user()->company_id) }}" class="btn btn-warning btn-icon text-white mr-2" style="margin: auto;">
            <span>
                <i class="fe fe-user"></i>
            </span> <strong>Add Employee</strong>
        </a>
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
                <th>Status</th>
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
                    <a href="{{url('/admin/users/edituser/'.$user->company_id)}}/{{$user->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

                    @if($user->group_id !=2)
                      <a href="{{ url('/admin/users/delete/'.$user->id) }}" id="delete_user-{{$user->id}}" class="btn btn-default btn-sm" data-toggle="tooltip" data-original-title="Delete" 
                        onclick="
                        return confirm('Are you sure you want to Delete this user?')
                             event.preventDefault();
                             document.getElementById( "delete_user-{{$user->id}} ").submit();
                        "><i class="fa fa-trash-o"></i>
                        
                      </a>
                      <form id="delete_user-{{$user->id}}" action="{{ url('/admin/users/delete/'.$user->id) }}" method="POST" style="display: none;">
                          @csrf
                      </form>
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
