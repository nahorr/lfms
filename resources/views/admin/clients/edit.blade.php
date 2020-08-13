@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> Edit Client: {{$client->first_name}} {{$client->last_name}}</h3>
      </div>
      <div class="card-body">
          <form action="{{ url('/admin/clients/update',[$company->id, $client->id]) }}" method="POST">
                    @csrf()  
            <div class="form-group">
              <label class="form-label"><strong>Client #</strong></label>
              <input type="text" class="form-control" id="client_number" name="client_number" required="" value="{{$client->client_number}}">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>First Name</strong></label>
              <input type="text" class="form-control" id="first_name" name="first_name" required="" value="{{$client->first_name}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Last Name</strong></label>
              <input type="text" class="form-control" id="last_name" name="last_name" required="" value="{{$client->last_name}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Email</strong></label>
              <input type="email" class="form-control" id="email" name="email" required="" value="{{$client->email}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Phone Number</strong></label>
              <input type="text" class="form-control" id="phone" name="phone" required="" value="{{$client->phone}}">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>Address</strong></label>
              <input type="text" class="form-control" id="address" name="address" value="{{$client->address}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Address 2</strong></label>
              <input type="text" class="form-control" id="address_2" name="address_2" value="{{$client->address_2}}">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>City</strong></label>
              <input type="text" class="form-control" id="city" name="city" value="{{$client->city}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>State</strong></label>
              <input type="text" class="form-control" id="state" name="state" value="{{$client->state}}">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Country</strong></label>
              <input type="text" class="form-control" id="Country" name="country" value="{{$client->country}}">
            </div>      
            <div class="form-group">
              <label class="form-label"><strong>Additional Note</strong></label>
              <textarea class="form-control" id="client_note" name="client_note" rows="3">{{$client->client_note}}</textarea>
            </div>

          <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
          
@endsection
       