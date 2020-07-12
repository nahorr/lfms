@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="fa fa-file"></i> {{$category->category_name}} Template Table</h3>
        <a href="{{ url('admin/templates/category/newtemplate/'.$company->id) }}/{{$category->id}}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Addd a {{$category->category_name}} Template</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Template</th>
                <th>Updated</th>
                <th>Files</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($templates as $key => $template)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $template->template_category->category_name }}</td>
                <td>{{ $template->name }}</td>
                <td>{{ $template->created_at->toFormatteddateString() }}</td>
                <td>
                  <a class="btn btn-sm btn-light" href="{{ asset('uploads/templates/types/'.$category_location)}}/{{$template->template_file }}" target="_blank" role="button" data-toggle="tooltip" data-placement="top" title="click on file name to view">
                    {{ $template->template_file }}<i class="fa fa-download" style="color: Tomato;"></i>
                  </a>
                </td>
                <td>
                    <i class="fa fa-plus"></i>
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
