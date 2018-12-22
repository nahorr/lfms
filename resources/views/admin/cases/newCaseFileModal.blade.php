
<!-- The Modal -->
  <div class="modal fade" id="addNewCaseFileModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: Tomato;">
          <h4 class="modal-title" style="color: #FFF"><strong>New Case Form</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ url('admin/cases/addcase') }}" method="POST">
            @csrf()
            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Select a Client:</strong></label>
                <select class="form-control form-control-lg selectpicker" name="client_id" id="client_id" data-live-search="true">
                   @foreach($clients as $key => $client)

                      <option value="{{ $client->id }}" data-tokens="{{ $client->last_name }},{{ $client->first_name }}-{{ $client->client_number }}">
                          {{ $client->last_name }},{{ $client->first_name }}-{{ $client->client_number }}
                      </option>

                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Case #:</strong></label>
                <input type="text" class="form-control" id="case_number" name="case_number" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Case Title:</strong></label>
                <input type="text" class="form-control" id="case_title" name="case_title" required="">
              </div>
            </div>

            <div class="form-group">
              <label><strong>Case History:</strong></label>
              <textarea class="form-control" id="summernote" name="history" rows="3"></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Court Date and Time:</strong></label>
                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="court_date" name="court_date">
              </div>
            </div>

            <div class="form-group">
              <label><strong>Court Location:</strong></label>
              <textarea class="form-control" id="court_location" name="court_location" rows="3"></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Assigned To:</strong></label>
                <input type="text" class="form-control" id="assigned_to" name="assigned_to">
              </div>
              <div class="form-group col-md-6">
                <label><strong>Outcome:</strong></label>
                <input type="text" class="form-control" id="outcome" name="outcome">
              </div>
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

  <script type="text/javascript">
    //Summernote js
      $('#addNewCaseFileModal').on('shown.bs.modal', function() {
          $('#summernote').summernote({
            dialogsInBody: true,
            height: 300, // set editor height
            width: null,
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true  // set focus to editable area after initializing summernote
          });
        })
      //Bootstrap select picker
      $(function() {
        $('.selectpicker').selectpicker();
      });
  </script>
  