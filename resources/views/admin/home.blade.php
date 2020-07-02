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
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <a href="{{ url('/admin/lawyers/showlawyers/'.$company->id) }}">
              <i class="fa fa-black-tie text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{ url('/admin/lawyers/showlawyers/'.$company->id) }}">
                <strong>Lawyers</strong>
              </a>
              <a href="{{ url('/admin/lawyers/newlawyer/'.Auth::user()->company_id) }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit">
                <i class="fa fa-plus"></i>
              </a>
            </p>
            <h2 class="mb-0 number-font">
              <a href="{{ url('/admin/lawyers/showlawyers/'.$company->id) }}">
                {{ $company->users()->where('deleted_at',Null)->where('group_id', 4)->count() }}
              </a>
            </h2>
          </div>
        </div>
        
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar progress-bar-animated bg-warning w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary1">
            <a href="{{url('/admin/clients/showclients/'.$company->id)}}">
              <i class="fe fe-user-check text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/admin/clients/showclients/'.$company->id)}}">
                <strong>Clients</strong>
              </a>
              <a href="{{ url('/admin/clients/newclient/'.Auth::user()->company_id) }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit">
                <i class="fa fa-plus"></i>
              </a>
            </p>
            <h2 class="mb-0 number-font">
              <a href="{{url('/admin/clients/showclients/'.$company->id)}}">
               {{ $company->clients()->where('deleted_at',Null)->where('company_id', $company->id)->count() }}
              </a>
            </h2>
          </div>
        </div>
        
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar  bg-secondary1 w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-warning">
            <a href="{{url('/admin/cases/showcases/'.$company->id)}}">
              <i class="fa fa-gavel text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/admin/cases/showcases/'.$company->id)}}">
                <strong>Cases</strong>
              </a>
              <a href="{{ url('/admin/cases/showcases/'.Auth::user()->company_id) }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit">
                <i class="fa fa-plus"></i>
              </a>
             </p>
            <h2 class="mb-0 number-font">
              <a href="{{url('/admin/cases/showcases/'.$company->id)}}">
                {{ $company->client_cases()->where('deleted_at',Null)->where('company_id', $company->id)->count() }}
              </a>
            </h2>
          </div>
        </div>
        
        <div class="progress h-1 mt-0 mb-0">
          <div class="progress-bar progress-bar-animated bg-warning w-100" role="progressbar"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body text-center">
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-orange">
            <a href="{{url('/admin/templates/showcategories/'.$company->id)}}">
              <i class="fe fe-file-text text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/admin/templates/showcategories/'.$company->id)}}">
                <strong>Templates</strong>
              </a>
              <a href="{{ url('/admin/templates/newcategory/'.Auth::user()->company_id) }}" class="btn btn-default btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Edit">
                <i class="fa fa-plus"></i>
              </a>
            </p>
            <h3 class="mb-0 number-font">
              <a href="{{url('/admin/templates/showcategories/'.$company->id)}}">
                {{ $company->templatecategories()->where('company_id', $company->id)->count() }} Categories
              </a>
            </h3>
          </div>
        </div>
        
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
            <h2 class="mb-0 number-font">

              @foreach($cases as $case)
                @if( \Carbon\Carbon::now()->diffInDays($case->court_date) < 60 )
                @if($loop->last)
                  {{ $loop->iteration }}
                @endif
                @endif
              @endforeach
              <a href="{{url('/admin/templates/showcategories/'.$company->id)}}">
                {{ $company->client_cases()->where('company_id', $company->id)->count() }}
              </a>
            </h2>
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
