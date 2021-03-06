<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Beli Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST"  action="/projects_slot/{{$project->slug}}" enctype="multipart/form-data">
          <div class="form-group">
            Dengan ini Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="slot_id" id="slot_id" value="">
            {{-- <input type="hidden" class="form-control" name="username" id="username" value=""> --}}
          </div>

          {{-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div> --}}
          @csrf
          @method('PUT')
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>   
    </div>
  </div>
</div>

@section('addjs')
  <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var slotid = button.data('slotid') 
      var userid = button.data('userid') 
      var username = button.data('user_name') 


      var modal = $(this)
      
      modal.find('.modal-body #slot_id').val(slotid);
      modal.find('.modal-body #userid').val(userid);
      modal.find('.modal-body #username').val(username);
    })
  </script>
@endsection