@extends('layouts.app_user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('flash::message')
          @include('admin.form_error')
            <div class="card">
                <div class="card-header" style="font-size:20px;color:#FFF; background-color: #FF5733"><strong>{{ Auth::user()->name }}'s Profile</strong></div>
                <div class="card-body">               
                    <div class="container">
                        <div class="row" style="padding: 10px; border: 5px solid #f2f3f4 ;">

                            <div class="col-md-3">
                                <img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                              </div>

                              <div class="col-md-6 offset-md-1">
                                <h2>{{ Auth::user()->name }}'s Profile</h2>
                                <form enctype="multipart/form-data" action="{{url('/user/update_avatar') }}" method="POST">
                                  @csrf()
                                  <div class="form-group">
                                      <label for="exampleFormControlFile1">Update Profile Picture</label>
                                      <input type="file" name="avatar" class="form-control-file" id="avatar">
                                    </div>
                                    <button type="submit" class="btn btn-success">Update Picture</button>
                                  </form>
                              </div>
                        </div>

                        <div class="row" style="margin-top: 20px;  padding: 10px; border: 5px solid #f2f3f4;">                       
                        
                            <div class="col">
                              <form action="{{url('/user/update_password') }}" method="POST">
                                @csrf()
                                <h4> Change Your Password</h4>
                                <hr style="border: 1px solid #d5d8dc;">
                                <div class="form-group">
                                  <label for="currentpassword"><strong>Current Password</strong></label>
                                  <input type="password" class="form-control" name="currentpassword" placeholder="Enter Your Current Password" required="">
                                </div>
                                <div class="form-group">
                                  <label for="currentpassword"><strong>New Password</strong></label>
                                  <input id="password" type="password" class="form-control" name="password" placeholder="Enter a New Password" required="">
                                </div>
                                <div class="form-group">
                                  <label for="currentpassword"><strong>Confirm New Password</strong></label>
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required="">
                                </div>
                                <button type="submit" class="btn btn-danger">Update Password</button>
                              </form>
                            </div>
                        </div>

                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
