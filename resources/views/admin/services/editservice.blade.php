@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-handshake-o" aria-hidden="true"></i> Editing Service: {{$service->service_name}}</h3>
      </div>
      <div class="card-body">
      <form action="{{ url('/admin/services/updateservice',[$company->id,  $service->id]) }}" method="POST">
        @csrf()
        <div class="form-group">
          <label class="form-label">Service Name</label>
          <input type="text" class="form-control" name="service_name" value="{{$service->service_name}}">
        </div>
        <div class="form-group">
          <label class="form-label">Service Description</label>
          <input type="text" class="form-control" name="service_description" value="{{$service->service_description}}">
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
      </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
        
@endsection