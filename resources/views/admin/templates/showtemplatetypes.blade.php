@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
          @include('flash::message')
          @include('admin.form_error')
          @include('admin.includes.dashboard')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-file-contract"></i> Template Types</strong>
                  <button type="button" class="btn btn-warning" id="addNewTemplateType">New Template Type</button>
                </div>
                @include('admin.templates.newTemplateTypeModal')
                <script type="text/javascript">

                  $('#addNewTemplateType').on('click', function(e){
                     e.preventDefault();
                    $('#addNewTemplateTypeModal').modal('show');
                  })
                  
                </script>
               
                <div class="card-body">
                  <ul class="list-group">
                    @foreach($template_types as $key => $type)
                    <li class="list-group-item d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                      <strong><a href="{{ url('/admin/templates/types/showtemplates/'.$type->id) }}" data-toggle="tooltip" data-placement="top" title="view {{$type->type_name}} Templates">{{ $type->type_name }}</a> <a href="{{ url('/admin/templates/types/delete/'.$type->id) }}"><i class="far fa-trash-alt" style="color: red;" data-toggle="tooltip" data-placement="top" title="Delete Template Type"></i></a></strong>
                      <span class="badge badge-primary badge-pill" data-toggle="tooltip" data-placement="top" title="Number of templates">
                        {{ $templates->where('template_type_id', $type->id)->count() }}
                      </span>
                    </li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
