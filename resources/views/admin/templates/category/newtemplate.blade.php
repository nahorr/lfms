@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">New {{$category->category_name}} Template Form</h3>
      </div>
      <div class="card-body">
          <form enctype="multipart/form-data" action="{{ url('/admin/templates/category/addtemplate',[$company->id, $category->id]) }}" method="POST">
            @csrf()
            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>{{$category->category_name}} Template Name</strong></label>
                <input type="text" class="form-control" id="name" name="name" required="">
              </div>
            </div>

            <div class="form-group">
              <label><strong>Add {{$category->category_name}} Template File</strong></label>
              <input type="file" class="form-control-file" id="template_file" aria-describedby="fileHelp" name="template_file">
              <small id="fileHelp" class="form-text text-muted">Please add a template for this category type. You can download this template later for use.</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Form</button>
          </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
@endsection
        