@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #FF5733"><strong>Dashboard</strong></div>

                <div class="card-body">
                    <!-- First row starts -->
                    <div class="row">
                      
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Clients</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-user-plus" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4" style="border-bottom: 20px">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Cases</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-folder-open" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Agreements</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-file-alt" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- First row ends-->
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
