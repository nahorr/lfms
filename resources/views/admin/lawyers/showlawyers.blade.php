@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-black-tie"></i> Lawyers Table</h3>
        <a href="{{ url('/admin/lawyers/newlawyer/'.Auth::user()->company_id) }}" class="btn btn-danger btn-icon text-white mr-2" style="margin: auto;">
            <span>
                <i class="fa fa-black-tie"></i>
            </span> <strong>Add A Lawyer</strong>
        </a>
      </div>

      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This is <span class="bg-warning">Lawyer's</span> only Table. To add a new Layer, click on "<span class="bg-warning">Add A Lawuer</span>" above.
        </div>
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
                <th>Designation</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companylawyers as $key=>$lawyer)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $lawyer->name }}</td>
                <td>{{ $lawyer->email }}</td>
                <td>{{ $lawyer->company->company_name }}</td>
                <td>{{ $lawyer->designation }}</td>
                <td>
                  @if($lawyer->deleted_at != Null)
                    <span style="color: red">Deleted</span>
                  @else
                    <span style="color: green">Active</span>
                  @endif
                </td>
                <td>{{ $lawyer->created_at->toFormattedDateString()}}</td>
                <td>    

                  @if($lawyer->deleted_at === Null)
                  <a href="{{ url('/admin/lawyers/editlawyer/'.$lawyer->company_id) }}/{{$lawyer->id}}" class="btn btn-blue btn-sm" data-toggle="tooltip" data-original-title="Edit">
                    <i class="fa fa-pencil"></i>
                  </a>

                    <a href="{{ url('/admin/lawyers/delete/'.$lawyer->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" onclick=" return confirm('Are you sure you want to Delete this lawyer?');">
                      <i class="fa fa-trash-o"></i>                
                    </a>
                  @else
                    <a href="{{ url('/admin/lawyers/restore/'.$lawyer->id) }}" class="btn btn-orange btn-sm" data-toggle="tooltip" data-original-title="Restore" onclick=" return confirm('Are you sure you want to Restore this lawyer?');">
                      <i class="mdi mdi-restore"></i>                
                    </a>

                    <a href="{{ url('/admin/lawyers/deleteforever/'.$lawyer->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-original-title="Delete Forever" onclick=" return confirm('Are you sure you want to Delete this lawyer Forever?');">
                      <i class="mdi mdi-delete-forever"></i>                
                    </a>
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
