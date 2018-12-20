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
                  <button type="button" class="btn btn-warning" id="addNewTemplate">New Template Type</button>
                </div>
               
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Cras justo odio</strong>
                      <span class="badge badge-primary badge-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Dapibus ac facilisis in
                      <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Morbi leo risus
                      <span class="badge badge-primary badge-pill">1</span>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
