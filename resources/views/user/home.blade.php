@extends('layouts.app')

@section('content')

<!-- ROW -->
<div class="row mt-xl-5">
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{url('/user/templates/showtemplatetypes')}}">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-orange">
            <i class="fe fe-file-text"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Documents</strong></p>
            <h2 class="mb-0 number-font">7,896</h2>
          </div>
        </div>
        </a>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar bg-orange w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  @if(Auth::user()->is_admin == 1 || Auth::user()->is_superadmin == 1)
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <a href="{{url('/user/users/showusers')}}">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary">
            <i class="fe fe-users text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Users</strong></p>
            <h2 class="mb-0 number-font">2,897</h2>
          </div>
        </div>
        </a>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar bg-secondary w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <a href="{{url('/user/clients/showclients')}}">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary1">
            <i class="fe fe-user-check text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Clients</strong></p>
            <h2 class="mb-0 number-font">1,567</h2>
          </div>
        </div>
        </a>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar  bg-secondary1 w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <a href="{{url('/user/cases/showcases')}}">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <i class="fa fa-gavel text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Cases</strong></p>
            <h2 class="mb-0 number-font">4,293</h2>
          </div>
        </div>
        </a>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar progress-bar-animated bg-warning w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <i class="fa fa-bell text-white"></i>
            <span class="pulse1 bg-danger"></span>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Upcoming Cases</strong></p>
            <h2 class="mb-0 number-font">4,293</h2>
          </div>
        </div>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar progress-bar-animated bg-warning w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END ROW -->

@endsection
