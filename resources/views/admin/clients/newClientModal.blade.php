<!-- The Modal -->
  <div class="modal fade" id="addNewClientModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #ffed4a;">
          <h4 class="modal-title"><strong>New Client Form</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ url('admin/clients/addclient') }}" method="POST">
            @csrf()

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Client #</strong></label>
                <input type="text" class="form-control" id="client_number" name="client_number" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>First Name</strong></label>
                <input type="text" class="form-control" id="first_name" name="first_name" required="">
              </div>
              <div class="form-group col-md-6">
                <label><strong>Last Name</strong></label>
                <input type="text" class="form-control" id="last_name" name="last_name" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Email</strong></label>
                <input type="email" class="form-control" id="email" name="email" required="">
              </div>
              <div class="form-group col-md-6">
                <label><strong>Phone Number</strong></label>
                <input type="text" class="form-control" id="phone" name="phone" required="">
              </div>
            </div>
            <div class="form-group">
              <label><strong>Address</strong></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label><strong>Address 2</strong></label>
              <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label><strong>City</strong></label>
                <input type="text" class="form-control" id="city" name="city">
              </div>
              <div class="form-group col-md-4">
                <label><strong>State</strong></label>
                <input type="text" class="form-control" id="state" name="state">
              </div>
              <div class="form-group col-md-4">
                <label><strong>Country</strong></label>
                <input type="text" class="form-control" id="Country" name="country">
              </div>
            </div>
            <div class="form-group">
              <label><strong>Additional Note</strong></label>
              <textarea class="form-control" id="client_note" name="client_note" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Form</button>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>