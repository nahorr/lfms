@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:20px;color:#FFF; background-color: #FF5733"><strong>{{ Auth::user()->name }}'s Profile</strong></div>

                <div class="card-body">
                    
                    <div class="container">
                        <div class="row">

                            <div class="col-md-3">
                                <img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                              </div>

                              <div class="col-md-6 offset-md-1">
                                <h2>{{ Auth::user()->name }}'s Profile</h2>
                                <form enctype="multipart/form-data" action="{{url('update_avatar') }}" method="POST">
                                  @csrf()
                                  <div class="form-group">
                                      <label for="exampleFormControlFile1">Update Profile Picture</label>
                                      <input type="file" name="avatar" class="form-control-file" id="avatar">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
