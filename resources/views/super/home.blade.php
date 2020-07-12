@extends('layouts.app_user')

@section('content')

<!-- ROW -->
<div class="row mt-xl-5">

  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary">
            <a href="{{url('/super/companies/showcompanies')}}"><i class="fa fa-building-o text-white"></i></a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/super/companies/showcompanies')}}">
                <strong>Companies</strong>
              </a>
              <a href="{{ url('/super/companies/newcompany') }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-plus"></i></a>
            </p>
            <h2 class="mb-0 number-font"><a href="{{url('/super/companies/showcompanies')}}">{{ $companies->count() }}</a></h2>
          </div>
        </div>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar  bg-secondary w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <i class="fe fe-users text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/super/users/showusers')}}">
                <strong>Users</strong>
              </a>
              <a href="{{ url('/super/users/newuser') }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-plus"></i></a>
            </p>
            <h2 class="mb-0 number-font"><a href="{{url('/super/users/showusers')}}">{{ $users->count() }}</a></h2>
          </div>
        </div>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar bg-warning w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">    
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-primary">
            <i class="fa fa-dollar text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/super/subscriptions/showsubscriptions')}}">
                <strong>Subscriptions</strong>
              </a>
              <a href="{{ url('/super/subscriptions/newsubscription') }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-plus"></i></a>
            </p>
            <h2 class="mb-0 number-font"><a href="{{url('/super/subscriptions/showsubscriptions')}}">{{ $subscriptions->count() }}</a></h2>
          </div>
        </div>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar  bg-primary w-50" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END ROW -->

@endsection