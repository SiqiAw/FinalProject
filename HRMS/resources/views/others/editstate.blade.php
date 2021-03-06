
  <div class="modal fade" id="editState{{$state->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit State</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{route('updateState')}}" enctype="multipart/form-data">
            @csrf 
              <div class="form-group">
                  <label>State ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $state->id }}">
              </div>
              <div class="mb-3">
                  <label>State Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $state->name }}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
        </div> 
      </div>
    </div>
  </div>
