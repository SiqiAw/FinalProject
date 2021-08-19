<form method="post" action="{{route('updateCert')}}" enctype="multipart/form-data">
  @csrf 
  <div class="modal fade" id="editCert{{$certificate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Certificate</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label>Certificate ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $certificate->id }}">
              </div>
              <div class="mb-3">
                  <label>Certificate Name</label>
                  <input type="text" class="form-control" id="certificate_name" name="certificate_name" value="{{ $certificate->certificate_name }}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update Department</button>
              </div>
        </div> 
      </div>
    </div>
  </div>
</form>