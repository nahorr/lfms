@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
        
        <div class="col-md-8">

          <div class="card">
              <div class="card-header" style="font-size:20px;color:#FFF; background-color: #FF5733"><strong>User Dashboard <span class="float-right">{{ $company->company_name }}</span></strong></div>
              <div class="card-body">

                  <!-- First row starts -->
                  <div class="row">

                    @if(Auth::user()->is_admin == 1)
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Users</strong></h5>
                          <a href="{{url('/user/users/showusers')}}">
                              <p class="card-text">
                                  <i class="fa fa-users" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>
                    @endif

                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Clients</strong></h5>
                          <a href="{{url('/user/clients/showclients')}}">
                              <p class="card-text">
                                  <i class="fa fa-user-plus" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4" style="border-bottom: 20px">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Cases</strong></h5>
                          <a href="{{url('/user/cases/showcases')}}">
                              <p class="card-text">
                                  <i class="fa fa-balance-scale" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- First row ends-->
                  
                  <!-- Second row starts-->
                  <div class="row top-buffer">

                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Templates</strong></h5>
                          <a href="{{url('/user/templates/showtemplatetypes')}}">
                              <p class="card-text">
                                  <i class="fa fa-file-contract" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Court Dates</strong></h5>
                          <a href="{{url('/user/cases/courtdates')}}">
                              <p class="card-text">
                                  <i class="fa fa-calendar-alt" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body text-center">
                          <h5 class="card-title"><strong>Expiration Dates</strong></h5>
                          <a href="{{url('/user/cases/courtdates')}}">
                              <p class="card-text">
                                  <i class="fa fa-calendar-times" style="font-size:40px;color:#2E86C1;"></i>
                              </p>
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- Second Row Ends -->

              </div>
          </div>

        </div>
  </div>
</div>

@endsection
