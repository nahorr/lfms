@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> New Template Form</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('admin.services.create.template', $company->id) }}" method="POST" enctype="multipart/form-data">
              @csrf()
            <div class="form-group">
              <label class="form-label"> Select a Service </label>
              <select class="form-control select2-show-search" name="service_id" data-placeholder="Select a service" required="">
                @foreach($services as $key => $service)
                  <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Template Name</strong></label>
              <input type="text" class="form-control" name="name" required="" placeholder="Enter a name for this template">
            </div>
            <div class="form-group">
              <label class="form-label">Template Description</label>
              <textarea type="text" class="form-control" name="description" placeholder="Describe this template if you like..."></textarea>
            </div>
            <!-- Bootstrap files: add template file-->
            <div class="form-row">
              <div class="form-group col-md-12">
              <label class="g-mb-5"><strong>Template File - <span style="color: red">You can only add one file.</span></strong></label>               
                <div class="form-group">
                  <div class="file-loading">
                      <input type="file" name="template_file" required="">
                  </div>
                </div>
            </div>
            </div>
            <!-- Bootstrap files: add product photos -->
          <button type="submit" class="btn btn-primary">Add Template</button>
        </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
@endsection
