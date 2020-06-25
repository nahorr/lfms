<!-- The Modal -->
  <div class="modal fade" id="addNewTempalateModal-{{ $type->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #ffed4a;">
          <h4 class="modal-title">New {{ $type->type_name }} Template Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form enctype="multipart/form-data" action="{{ url('admin/templates/types/addtemplate/'.$type->id) }}" method="POST">
            @csrf()

            <input type="hidden" name="template_type_id" value="{{ $type->id }}" required="">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label><strong>Template Name</strong></label>
                <input type="text" class="form-control" id="name" name="name" required="">
              </div>
            </div>

            <div class="form-group">
              <label><strong>Add Template File</strong></label>
              <input type="file" class="form-control-file" id="template_file" aria-describedby="fileHelp" name="template_file">
              <small id="fileHelp" class="form-text text-muted">Please add a template for this agreement type. You can download this template later for use.</small>
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