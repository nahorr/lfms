@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-11">
          @include('flash::message')
          @include('admin.form_error')
          @include('admin.includes.dashboard')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-file-alt"></i> {{ $type->type_name}} Templates</strong>
                  <button type="button" class="btn btn-warning" id="addNewTemplate-{{$type->id}}">New {{ $type->type_name}} Template</button>
                </div>
                @include('admin.templates.types.newTemplateModal')
                <script type="text/javascript">

                  $('#addNewTemplate-{{$type->id}}').on('click', function(e){
                     e.preventDefault();
                    $('#addNewTempalateModal-{{ $type->id }}').modal('show');
                  })
                  
                </script>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Type</th>
                          <th scope="col">Added</th>
                          <th scope="col">Updated</th>
                          <th scope="col">Template</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($templates as $key=>$template)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $template->name }}</td>
                          <td>{{ $template->created_at->toFormatteddateString() }}</td>
                          <td>{{ $template->updated_at->toFormatteddateString() }}</td>
                          <td>
                            <a class="btn btn-light" href="{{ asset('uploads/templates/types/'.$type_location)}}/{{$template->template_file }}" target="_blank" role="button" data-toggle="tooltip" data-placement="top" title="click on file name to view" id="addNewCase-{{$template->id}}">
                              {{ $template->template_file }}<i class="fas fa-download" style="color: Tomato;"></i>
                            </a>
                          </td>
                          <td>
                            <button template="button" class="btn btn-primary" id="editAgreementtemplate-{{$template->id}}">Edit</button>
                          </td>
                         
                          <td>
                            <a class=" btn btn-danger" href="{{url('admin/agreements/templates/deleteagreementtemplate/'.$template->id)}}" role="button" onclick="return confirm('Are you sure you want to Delete this user?')"><i class="fa fa-trash" style="color: #FFF;"></i> Delete</a>
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
</div>
@endsection
