@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-handshake-o"></i> Services Table</h3>
        <a href="{{ url('/admin/services/addnewservice/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Add a New Service</strong>
        </a>
      </div>

      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This table shows all services you offer at your company. To add a new user, click on "<span class="bg-warning">Add a New Service</span>" above. To show all clients under a service, you can click on the botton showing the number of clients under "SERVICE" column. Use the "ACTION" column to add, edit, or delete a service.
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>service</th>                
                <th>Description</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companyservices as $key => $service)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>
                  {{ $service->service_name }} 
                  <a href="{{ asset('/admin/services/showclientservices/'.$company->id) }}/{{$service->id}}" data-toggle="tooltip" data-placement="top" title="View/Add clients to this service" class="btn btn-sm btn-outline-danger float-right">
                    {{$service->client_services->count()}} <i class="fa fa-users"></i> clients
                  </a>
                </td>
                <td>{{ $service->service_description }}</td>
                <td>
                  @if($service->deleted_at != Null)
                    <span style="color: red">Deleted</span>
                  @else
                    <span style="color: green">Active</span>
                  @endif
                </td> 
                <td>{{ $service->created_at->toFormattedDateString() }}</td>
                <td>
                  @if($service->deleted_at === Null)
                    <a class="btn btn-sm btn-blue" href="{{ asset('/admin/services/addclientservice/'.$company->id)}}/{{$service->id}}" data-toggle="tooltip" data-placement="top" data-container="body" title="Add New {{$service->service_name}} Service">
                      <i class="fa fa-plus"></i>
                    </a>

                    <a href="{{url('/admin/services/editservice/'.$company->id)}}/{{$service->id}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                      <i class="fa fa-pencil text-white"></i>
                    </a>

                    <a href="{{url('/admin/services/delete/'.$service->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash text-white" onclick="return confirm('Are you sure you want to Delete this service?');"></i>
                    </a>
                  @else
                    <a class="btn btn-sm btn-orange" href="{{url('/admin/services/restore/'.$service->id)}}" data-toggle="tooltip" data-placement="top" data-container="body" title="Restore this Service" onclick="return confirm('Are you sure you want to Restore this service?');">
                      <i class="mdi mdi-restore"></i>
                    </a>

                    <a href="{{url('/admin/services/deleteforever/'.$service->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Forever" onclick="return confirm('Are you sure you want to Delete this service Forever?');">
                      <i class="mdi mdi-delete-forever"></i>
                    </a>
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
