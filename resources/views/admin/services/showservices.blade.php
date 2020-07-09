@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-handshake-o"></i> service service Table</h3>
        <a href="{{ url('/admin/services/addnewservice/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>New service service</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>service</th>
                <th>Description</th>
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
                  <a href="{{ asset('/admin/services/showclientservices/'.$company->id) }}/{{$service->id}}">
                    <span class="badgetext badge badge-danger badge-pill">{{$service->client_services->count()}} clients</span>
                  </a>
                </td>
                <td>{{ $service->service_description }}</td>
                <td>{{ $service->created_at }}</td>
                <td>
                    <a class="btn btn-light" href="{{ asset('/admin/services/addclientservice/'.$company->id)}}/{{$service->id}}" role="button" data-toggle="tooltip" data-placement="top" data-container="body" title="click on file name to view">
                    <i class="fa fa-plus" style="color: Tomato;"></i>
                    </a>
                    <i class="fa fa-pencil"></i>
                    <i class="fa fa-trash"></i>
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
