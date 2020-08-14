@extends('layouts.app_user')

@section('content')

<!-- ROW -->
<div class="row mt-xl-5"> 

  <div class="col-xl-3 col-sm-6">
    <div class="card overflow-hidden">
      <div class="card-body text-center">
        
        <div class="d-flex mb-4">
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-orange">
            <a href="{{route('lawyer.show.cases', $company->id)}}">
              <i class="fa fa-gavel text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{route('lawyer.show.cases', $company->id)}}">
                <strong>Your Cases</strong>
              </a>
              <a href="{{route('lawyer.show.cases', $company->id)}}" class="btn btn-orange btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="View Your Cases">
                <i class="fa fa-eye"></i>
              </a>
             </p>
            <h2 class="mb-0 number-font">
              <a href="{{route('lawyer.show.cases', $company->id)}}">
                {{ $company->client_cases()->where('user_id',Auth::user()->id)->where('company_id', $company->id)->count() }}
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
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-secondary">
            <a href="{{url('/admin/services/showservices/'.$company->id)}}">
              <i class="fa fa-handshake-o text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{url('/admin/services/showservices/'.$company->id)}}">
                <strong>Your Services</strong>
              </a>
              <a href="{{ url('/admin/services/addnewservice/'.Auth::user()->company_id) }}" class="btn btn-secondary btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Add">
                <i class="fa fa-eye"></i>
              </a>
             </p>
            <h2 class="mb-0 number-font">
              <a href="{{url('/admin/services/showservices/'.$company->id)}}">
                {{ \App\ClientService::where('user_id',Auth::user()->id)->where('company_id', $company->id)->count() }}
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
          <span class="brround align-self-center avatar-lg br-3 cover-image bg-lime">
            <a href="{{url('/admin/services/showservices/'.$company->id)}}">
              <i class="fa fa-file text-white"></i>
            </a>
          </span>
          <div class="svg-icons text-right ml-auto">
            <p class="text-muted mb-2">
              <a href="{{route('admin.services.show.templates', $company->id)}}">
                <strong>Templates</strong>
              </a>
              <a href="{{ url('/admin/services/templates/add/'.Auth::user()->company_id) }}" class="btn btn-lime btn-sm ml-2 mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Add">
                <i class="fa fa-eye"></i>
              </a>
             </p>
            <h2 class="mb-0 number-font">
              <a href="{{url('/admin/services/showservices/'.$company->id)}}">
                {{ $company->templates()->where('company_id', $company->id)->count() }}
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
