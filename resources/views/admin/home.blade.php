@extends('layouts.app_user')

@section('content')
<!-- ROW -->
<div class="row mt-xl-5"> 
  @if(Auth::user()->group_id == 2)
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary">
            <a href="{{url('/admin/users/showusers/'.$company->id)}}"><i class="fe fe-users text-white"></i></a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/admin/users/showusers/'.$company->id)}}">
                <strong>Employees</strong>
              </a>
              <a href="{{ url('/admin/users/newuser/'.Auth::user()->company_id) }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit">
                <i class="fa fa-plus"></i>
              </a>
            </p>
            <h2 class="mb-0 number-font">
              <a href="{{url('/admin/users/showusers/'.$company->id)}}">{{ $company->users()->where('deleted_at',Null)->count() }}</a>
            </h2>
          </div>
        </div>
        
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
        <a href="{{ url('/admin/lawyers/showlawyers/'.$company->id)}}">
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <i class="fa fa-black-tie text-white"></i>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2"><strong>Lawyers</strong></p>
            <h2 class="mb-0 number-font">4,293</h2>
          </div>
        </div>
        </a>
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar progress-bar-animated bg-warning w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
 
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
          <div class="progress-bar  bg-secondary1 w-100" role="progressbar"></div>
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
          <div class="progress-bar progress-bar-animated bg-warning w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
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
          <div class="progress-bar bg-orange w-100" role="progressbar"></div>
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
          <div class="progress-bar progress-bar-animated bg-warning w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<!-- END ROW --> 
@endsection
