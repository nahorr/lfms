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
                  <button type="button" class="btn btn-warning" id="addNewClient">New Agreement Type</button>
                </div>
                
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

                        @foreach($agreement_types as $type)
                        <tr>
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
