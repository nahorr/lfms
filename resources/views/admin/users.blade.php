@extends('admin.layouts.app')

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
                          <th scope="col">Date Added</th>
                          <th scope="col">Change Role</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>
                            {{ $user->name }}
                            @if($user->is_admin == 1)
                              <button type="button" class="btn btn-primary btn-sm">Admin</button>
                            @endif
                          </td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at->toFormatteddateString() }}</td>
                          <td>
                            @if($user->is_admin == 1)
                              <form action="{{ url('/admin/home/makeUser', [$user->id])}}" method="POST">
                                {{ csrf_field() }}
                                  <input name="is_admin" type="hidden" value="0">
                                  
                                  <button type="button" class="btn btn btn-success" onclick="return confirm('Are you sure you want to remove this user from admin list?')">Make User&nbsp;&nbsp;
                                  </button>
                              </form>
                              
                            @else
                              <button type="button" class="btn btn-warning">Make Admin</button>
                            @endif
                          </td>
                          <td>
                            <a class=" btn btn-danger" href="{{url('admin/deleteuser/'.$user->id)}}" role="button" onclick="return confirm('Are you sure you want to Delete this user?')"><i class="fa fa-trash" style="color: #FFF;"></i> Delete</a>
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
