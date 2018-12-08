<!-- The Modal -->
  <div class="modal fade" id="editClientModal-{{$client->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #2E86C1;">
          <h4 class="modal-title">Edit Client - {{ $client->last_name }}, {{ $client->first_name }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ url('admin/clients/editclient/'.$client->id) }}" method="POST">
            @csrf()

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Client #</label>
                <input type="text" class="form-control" id="client_number" name="client_number" required="" value="{{ $client->client_number }}">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required="" value="{{ $client->first_name }}">
              </div>
              <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required="" value="{{ $client->last_name }}">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" required="" value="{{ $client->email }}">
              </div>
              <div class="form-group col-md-6">
                <label>Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" required="" value="{{ $client->phone }}">
              </div>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}">
            </div>
            <div class="form-group">
              <label>Address 2</label>
              <input type="text" class="form-control" id="address_2" name="address_2" value="{{ $client->address_2 }}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $client->city }}">
              </div>
              <div class="form-group col-md-4">
                <label>State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ $client->state }}">
              </div>
              <div class="form-group col-md-4">
                <label>Country</label>
                <input type="text" class="form-control" id="Country" name="country" value="{{ $client->country }}">
              </div>
            </div>
            <div class="form-group">
              <label>Additional Note</label>
              <textarea class="form-control" id="client_note" name="client_note" rows="3">{{ $client->client_note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Client</button>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>