<form method="post" action="{{route('updateMarital')}}" enctype="multipart/form-data">
  @csrf 
  <div class="modal fade" id="editMarital{{$statusmarital->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Marital Status</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="mb-3">
                  <label>Marital Status ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $statusmarital->id }}">
              </div>
              <div class="mb-3">
                  <label>Marital Status Name</label>
                  <input type="text" class="form-control" id="maritalstatus_name" name="maritalstatus_name" value="{{ $statusmarital->maritalstatus_name }}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update Marital Status</button>
              </div>
        </div> 
      </div>
    </div>
  </div>
</form>