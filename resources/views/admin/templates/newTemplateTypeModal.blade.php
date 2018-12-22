<!-- The Modal -->
  <div class="modal fade" id="addNewTemplateTypeModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #ffed4a;">
          <h4 class="modal-title">New Template Type Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ url('admin/templates/types') }}" method="POST">
            @csrf()

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Template Type(eg. Agreements)</strong></label>
                <input type="text" class="form-control" id="type_name" name="type_name" required="">
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