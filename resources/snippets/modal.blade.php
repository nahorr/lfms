<!-- The Modal -->
  <div class="modal" id="addNewUserModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New user Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- End Modal -->

@include('admin.add_new_user_modal')
<script type="text/javascript">
  $('#addNewUser').on('click', function(e){
     e.preventDefault();
    $('#addNewUserModal').modal('show');
  })
</script>