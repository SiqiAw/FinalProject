<form method="post" action="{{route('updateNationality')}}" enctype="multipart/form-data">
  @csrf 
  <div class="modal fade" id="editNationality{{$nationality->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Nationality</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="mb-3">
                  <label>Nationality ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $nationality->id }}">
              </div>
              <div class="mb-3">
                  <label>Nationality Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $nationality->name }}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </div> 
      </div>
    </div>
  </div>
</form>