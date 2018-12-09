@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
          @include('flash::message')
          @include('admin.form_error')
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1">
                  <strong><i class="fas fa-file-alt"></i> Agreement Types</strong>
                  <button type="button" class="btn btn-warning" id="addAgreementType">New Agreement Type</button>
                </div>
                @include('admin.agreements.types.newAgreementTypeModal')
                <script type="text/javascript">
                  $('#addAgreementType').on('click', function(e){
                     e.preventDefault();
                    $('#addNewAgreementTypeModal').modal('show');
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
                          <th scope="col">Template</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($agreement_types as $key=>$type)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $type->name }}</td>
                          <td>{{ $type->created_at->toFormatteddateString() }}</td>
                          <td>
                            <a class="btn btn-light" href="{{ asset('uploads/agreements/types/'.$type->template) }}" target="_blank" role="button" data-toggle="tooltip" data-placement="top" title="click on file name to view" id="addNewCase-{{$type->id}}">
                              {{ $type->template }}<i class="fas fa-download" style="color: Tomato;"></i>
                            </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary" id="editAgreementType-{{$type->id}}">Edit</button>
                          </td>
                         
                          <td>
                            <a class=" btn btn-danger" href="{{url('admin/agreements/types/deleteagreementtype/'.$type->id)}}" role="button" onclick="return confirm('Are you sure you want to Delete this user?')"><i class="fa fa-trash" style="color: #FFF;"></i> Delete</a>
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
