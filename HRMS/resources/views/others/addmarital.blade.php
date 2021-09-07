<div class="modal fade" id="addMarital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Marital Status</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addMarital') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Marital Status</label>
                <input class="form-control" name="maritalstatus_name" placeholder="Enter marital status name" />      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Marital Status</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>