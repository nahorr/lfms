@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1"><strong><i class="fas fa-database"></i> Dashboard</strong></div>

                <div class="card-body">
                    <!-- First row starts -->
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Users</strong></h5>
                            <a href="{{url('/admin/users')}}">
                                <p class="card-text">
                                    <i class="fa fa-users" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Clients</strong></h5>
                            <a href="{{url('/admin/clients/showclients')}}">
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
                            <a href="{{url('/admin/cases/showcases')}}">
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
                            <h5 class="card-title"><strong>Agreements</strong></h5>
                            <a href="{{url('/admin/agreements/types/showagreementtypes')}}">
                                <p class="card-text">
                                    <i class="fa fa-file-alt" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Court Dates</strong></h5>
                            <a href="{{url('/admin/cases/courtdates')}}">
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
                            <a href="{{url('/admin/agreements/types/showagreementtypes')}}">
                                <p class="card-text">
                                    <i class="fa fa-calendar-times" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
