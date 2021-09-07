<div class="modal fade" id="addLeavetype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Leave Type</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addLeavetype') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Leave Type</label>
                <input class="form-control" name="name" placeholder="Enter leave type" />      
            </div>
            <div class="mb-3">
                <label for="">Total Days Entitled</label>
                <input class="form-control" name="entitleDays" placeholder="Enter days entitled" />      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>