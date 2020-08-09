@extends('layouts.app_user')

@section('content')

<!-- ROW-4 -->
<div class="row mt-xl-5">
  <div class="col-md-12 col-lg-12">
    @include('flash::message')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title mr-10"><i class="mdi mdi-file-multiple"></i> Templates</h3>
        <a href="{{ route('admin.services.add.template', $company->id) }}" class="btn btn-secondary btn-icon text-white mr-2" style="margin-left: auto">
          <span>
              <i class="fa fa-plus"></i>
          </span> <strong>Add a Template</strong>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>Template</th>
                <th>Description</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($templates as $key => $template)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>
                  {{ $template->template_name }} 
                  <a href="{{ asset('/admin/templates/template/showtemplates/'.$company->id) }}/{{$template->id}}">
                    <span class="badgetext badge badge-danger badge-pill">{{$template->templates->count()}}</span>
                  </a>
                </td>
                <td>{{ $template->description }}</td>
                <td>{{ $template->created_at }}</td>
                <td>
                    <a class="btn btn-light" href="{{ asset('/admin/templates/template/showtemplates/'.$template->id)}}" target="_blank" role="button" data-toggle="tooltip" data-placement="top" data-container="body" title="click on file name to view">
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
