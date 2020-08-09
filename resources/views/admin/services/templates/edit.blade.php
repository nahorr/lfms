@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> Edit Template: {{$template->name}}</h3>
      </div>
      <div class="card-body">
          <form action="{{ route('admin.services.update.template', [$company->id, $template->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf()
            <div class="form-group">
              <label class="form-label"> Move to a different Service </label>
              <select class="form-control select2-show-search" name="service_id" data-placeholder="Select a service" required="">
                @foreach($services as $key => $service)
                  <option value="{{ $service->id }}" @if($service->id === $template->service_id) selected @endif>{{ $service->service_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Template Name</strong></label>
              <input type="text" class="form-control" name="name" required="" value="{{$template->name}}">
            </div>
            <div class="form-group">
              <label class="form-label">Template Description</label>
              <textarea type="text" class="form-control" name="description">{{$template->description}}</textarea>
            </div>
            <!-- Bootstrap files: add template file-->
            <div class="form-row">
              <div class="form-group col-md-12">
              <label class="g-mb-5"><strong>Replace Template File - <span style="color: red">You can only add one file.</span></strong></label>  
              <p>Current File: 
              	<a href="{{ asset('/uploads/companies/templates/'.$company->id) }}/{{$template->template_file}}">
              	    <i class="mdi mdi-download"></i>{{$template->template_file}}
              	</a>
              </p>             
                <div class="form-group">
                  <div class="file-loading">
                      <input type="file" name="template_file">
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
