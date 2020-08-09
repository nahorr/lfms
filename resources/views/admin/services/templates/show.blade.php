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
                <th>Service</th>
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
                <td>{{ $template->service->service_name }}</td>
                <td>
                  {{ $template->name }} 
                  <a href="{{ asset('/uploads/companies/templates/'.$company->id) }}/{{$template->template_file}}">
                    <span class="badgetext badge badge-danger badge-pill"><i class="mdi mdi-download"></i> {{$template->template_file}}</span>
                  </a>
                </td>
                <td>{{ $template->description }}</td>
                <td>{{ $template->created_at->toFormatteddateString() }}</td>
                <td>
                        <a class="mr-1" href="{{ asset('/uploads/companies/templates/'.$company->id) }}/{{$template->template_file}}" target="_blank" data-toggle="tooltip" data-placement="top" data-container="body" title="download">
                          <i class="mdi mdi-download" style="color: green;"></i>
                        </a>

                        <a class="mr-1" href="{{ route('admin.services.edit.template', [$company->id, $template->id]) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="edit">
                          <i class="mdi mdi-pencil" style="color: black;"></i>
                        </a>
                        
                        @if(!$template->deleted_at)
                          <a class="mr-1" href="{{ route('admin.services.delete.template', $template->id) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="delete">
                            <i class="mdi mdi-delete" style="color: red;"></i>
                          </a>
                        @else
                          <a class="mr-1" href="{{ route('admin.services.restore.template', $template->id) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="restore">
                            <i class="mdi mdi-backup-restore" style="color: red;"></i>
                          </a>
                          <a class="mr-1" href="{{ route('admin.services.deleteforever.template', [$company->id, $template->id]) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="delete forever">
                            <i class="mdi mdi-delete-forever" style="color: black;"></i>
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
