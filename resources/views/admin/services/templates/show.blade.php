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
      <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>This table shows all Templates for your company. To add a new Template, click on "<span class="bg-warning">Add a Template</span>" above. To downlaod template file, click on the  download button under "ACTION" column. Use the "ACTION" column to download, add, edit, or delete a case. You can also use the search feature to search for a particular template based on Template name, Dates, service type, and so on.
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
            <thead>
              <tr>
                <th>#</th>
                <th>Service</th>
                <th>Name</th>
                <th>File</th>
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
                </td>
                <td>
                  <a href="{{ asset('/uploads/companies/templates/'.$company->id) }}/{{$template->template_file}}" class="btn btn-sm btn-outline-danger float-left">
                    <i class="mdi mdi-download"></i> {{$template->template_file}}</span>
                  </a>
                </td>
                <td>{{ $template->created_at->toFormatteddateString() }}</td>
                <td>
                               
                    @if(!$template->deleted_at)
                      <a class="btn btn-sm btn-green mr-1" href="{{ asset('/uploads/companies/templates/'.$company->id) }}/{{$template->template_file}}" target="_blank" data-toggle="tooltip" data-placement="top" data-container="body" title="download">
                        <i class="mdi mdi-download"></i>
                      </a>

                      <a class="btn btn-sm btn-blue mr-1" href="{{ route('admin.services.edit.template', [$company->id, $template->id]) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="edit">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                      <a class="btn btn-sm btn-danger mr-1" href="{{ route('admin.services.delete.template', $template->id) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="delete" onclick="return confirm('Are you sure you want to delete this template?');">
                        <i class="mdi mdi-delete"></i>
                      </a>
                    @else
                      <a class="btn btn-sm btn-orange mr-1" href="{{ route('admin.services.restore.template', $template->id) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="restore" onclick="return confirm('Are you sure you want to restore this template?');">
                        <i class="mdi mdi-backup-restore"></i>
                      </a>
                      <a class="btn btn-sm btn-dark mr-1" href="{{ route('admin.services.deleteforever.template', [$company->id, $template->id]) }}" data-toggle="tooltip" data-placement="top" data-container="body" title="delete forever" onclick="return confirm('Are you sure you want to delete this template forever?');">
                        <i class="mdi mdi-delete-forever" ></i>
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
