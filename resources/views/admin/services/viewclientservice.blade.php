@extends('layouts.app_user')

@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')

    <!-- ROW-1 OPEN -->
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="wideget-user text-center">
              <div class="wideget-user-desc">
                <div class="wideget-user-img">
                  <img class="" src="{{asset('/assets/images/clients/default.png')}}" alt="{{$clientservice->client->first_name}} {{$clientservice->client->last_name}}">
                </div>
                <div class="user-wrap">
                  <h4 class="mb-1">{{$clientservice->client->first_name}} {{$clientservice->client->last_name}}</h4>
                  <h6 class="text-muted mb-4">Clinet Since: {{$clientservice->client->created_at->toFormatteddateString()}}</h6>                         
                  <!-- <a href="#" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Follow</a>
                  <a href="#" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i> E-mail</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card">
          <div class="wideget-user-tab">
            <div class="tab-menu-heading">
              <div class="tabs-menu1">
                <ul class="nav">
                  <li class=""><a href="#tab-51" class="active show" data-toggle="tab">{{$clientservice->service_title}}</a></li>
                  <!-- <li><a href="#tab-61" data-toggle="tab" class="">Friends</a></li>
                  <li><a href="#tab-71" data-toggle="tab" class="">Gallery</a></li>
                  <li><a href="#tab-81" data-toggle="tab" class="">Followers</a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-51">
            <div class="card">
              <div class="card-body">
                <div id="profile-log-switch">
                  <div class="media-heading">
                    <h5><strong>{{$clientservice->service_title}}</strong></h5>
                  </div>
                  <div class="table-responsive ">
                    <table class="table row table-borderless">
                      <tbody class="col-lg-12 col-xl-6 p-0">
                        <tr>
                          <td><strong> Client Name:</strong> {{$clientservice->client->first_name}} {{$clientservice->client->last_name}}</td>
                        </tr>
                        <tr>
                          <td><strong>Service #:</strong> {{$clientservice->service_number}}</td>
                        </tr>
                        <tr>
                          <td><strong>Title :</strong> {{$clientservice->service_title}}</td>
                        </tr>
                      </tbody>
                      <tbody class="col-lg-12 col-xl-6 p-0">
                        <tr>
                          <td><strong>Service Category :</strong> {{$clientservice->service->service_name}}</td>
                        </tr>
                        <tr>
                          <td><strong>Effective Date :</strong> {{$clientservice->effective_date->toFormattedDateString()}}</td>
                        </tr>
                        <tr>
                          <td><strong>Creation Date :</strong> {{$clientservice->created_at->toFormattedDateString()}} </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row profie-img">
                    <div class="col-md-12">
                      <div class="media-heading">
                        <h5><strong>Service Details</strong></h5>
                        <hr style="padding: 0px; margin: 0px; border: 1px solid gray;">
                      </div>
                      <p>
                        {{strip_tags($clientservice->service_details)}}
                      </p>
                    </div>
                  </div>
                  <div class="row profie-img">
                    <div class="col-md-12">
                      <div class="media-heading">
                        <h5><strong>Service Files</strong></h5>
                        <hr style="padding: 0px; margin: 0px; border: 1px solid gray;">
                      </div>
                      <p>
                        <ol class="list-order-style">
                          @for($i=0; $i < count(json_decode($clientservice->service_files)); $i++)
                            <li class="mb-2">
                              <a href="{{url('/uploads/companies/services/'.$company->id)}}/{{json_decode($clientservice->service_files)[$i]}}">
                                <i class="fa fa-download"></i> {{ json_decode($clientservice->service_files)[$i] }}
                              </a>
                            </li>
                          @endfor
                        </ol>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-61">
            <ul class="widget-users row">
              <li class="col-lg-4  col-md-6 col-sm-12 col-12">
                <div class="card">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/15.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">James Thomas</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/9.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">George Clooney</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/20.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">Robert Downey Jr.</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card mb-lg-0">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/12.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">Emma Watson</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card mb-lg-0">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/4.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">Mila Kunis</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="card mb-0">
                  <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/6.jpg"></span>
                    <h4 class="h4 mb-0 mt-3">Ryan Gossling</h4>
                    <p class="card-text">Web designer</p>
                  </div>
                  <div class="card-footer text-center">
                    <div class="row user-social-detail">
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                      </div>
                      <div class="col-lg-4 col-sm-4 col-4">
                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="tab-pane" id="tab-71">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/8.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/10.jpg" alt="banner image ">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/11.jpg" alt="banner image ">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5 " src="../../assets/images/media/12.jpg" alt="banner image ">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/13.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/14.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-5" src="../../assets/images/media/15.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-0" src="../../assets/images/media/16.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-0" src="../../assets/images/media/17.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-0" src="../../assets/images/media/18.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded mb-0" src="../../assets/images/media/19.jpg " alt="banner image">
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <img class="img-fluid rounded" src="../../assets/images/media/20.jpg " alt="banner image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-81">
            <div class="row">
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/18.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class=" font-weight-semibold text-dark">John Paige</a>
                      <p class="text-muted mb-0">johan@gmail.com</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible">
                    <span class="avatar cover-image avatar-md brround bg-pink mr-3">LQ</span>
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="font-weight-semibold text-dark">Lillian Quinn</a>
                      <p class="text-muted mb-0">lilliangore</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <span class="avatar cover-image avatar-md brround mr-3">IH</span>
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="font-weight-semibold text-dark">Irene Harris</a>
                      <p class="text-muted mb-0">irharris@gmail.com</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/2.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="text-dark font-weight-semibold">Harry Fisher</a>
                      <p class="text-muted mb-0">harryuqt</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/19.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class=" font-weight-semibold text-dark">John Paige</a>
                      <p class="text-muted mb-0">johan@gmail.com</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden">
                  <div class="d-flex card-body media-xs overflow-visible">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/15.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="font-weight-semibold text-dark">Lillian Quinn</a>
                      <p class="text-muted mb-0">lilliangore</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden mb-lg-0">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/8.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="font-weight-semibold text-dark">Irene Harris</a>
                      <p class="text-muted mb-0">irharris@gmail.com</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 col-md-12">
                <div class="card borderover-flow-hidden mb-lg-0">
                  <div class="d-flex card-body media-xs overflow-visible ">
                    <img class="avatar brround avatar-md mr-3" src="../../assets/images/users/5.jpg" alt="avatar-img">
                    <div class="media-body valign-middle mt-1">
                      <a href="" class="text-dark font-weight-semibold">Harry Fisher</a>
                      <p class="text-muted mb-0">harryuqt</p>
                    </div>
                    <div class="media-body valign-middle text-right overflow-visible mt-2">
                      <button class="btn btn-light btn-sm" type="button">Follow</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->

  </div><!-- COL END -->
</div>
@endsection
