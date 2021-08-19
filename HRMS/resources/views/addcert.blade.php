<div class="modal fade" id="addCert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Certificate</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addCert') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Certificate Name</label>
                <input class="form-control" name="certificate_name" placeholder="Enter certificate name" />      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Certificate</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>