@extends('layouts.app_user')
@section('content')

<!-- ROW-1 OPEN -->
<div class="row">
  <div class="col-lg-12">
    @include('flash::message')
    @include('super.formerror')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-user"></i> New Client Form</h3>
      </div>
      <div class="card-body">
          <form action="{{ url('/admin/clients/addclient/'.$company->id) }}" method="POST">
                    @csrf()  
            <div class="form-group">
              <label class="form-label"><strong>Client #</strong></label>
              <input type="text" class="form-control" id="client_number" name="client_number" required="" placeholder="Client Number">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>First Name</strong></label>
              <input type="text" class="form-control" id="first_name" name="first_name" required="" placeholder="First Name">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Last Name</strong></label>
              <input type="text" class="form-control" id="last_name" name="last_name" required="" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Email</strong></label>
              <input type="email" class="form-control" id="email" name="email" required="" placeholder="Client's Email">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Phone Number</strong></label>
              <input type="text" class="form-control" id="phone" name="phone" required="" placeholder="Phone Number">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>Address</strong></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Address 2</strong></label>
              <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Apartment, studio, or floor">
            </div>
          
            <div class="form-group">
              <label class="form-label"><strong>City</strong></label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>State</strong></label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State">
            </div>
            <div class="form-group">
              <label class="form-label"><strong>Country</strong></label>
              <input type="text" class="form-control" id="Country" name="country" placeholder="Country">
            </div>      
            <div class="form-group">
              <label class="form-label"><strong>Additional Note</strong></label>
              <textarea class="form-control" id="client_note" name="client_note" rows="3" placeholder="Enter any other information that may be important here."></textarea>
            </div>

          <button type="submit" class="btn btn-primary">Add Client</button>
        </form>
      </div>
    </div>
  </div><!-- COL END -->
</div>
<!-- ROW-1 CLOSED -->
          
@endsection
       