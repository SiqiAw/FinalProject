<form method="post" action="{{route('updateWRKtime')}}" enctype="multipart/form-data">
  @csrf 
  <div class="modal fade" id="editWRKtime{{$workingtime->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Working Time</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="mb-3">
                  <label>Working Time ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $workingtime->id }}">
              </div>
              <div class="mb-3">
                  <label>Start Time</label>
                  <input type="time" class="form-control" id="start" name="start" value="{{ $workingtime->start }}">
              </div>
              <div class="mb-3">
                  <label>End Time</label>
                  <input type="time" class="form-control" id="end" name="end" value="{{ $workingtime->end }}">
              </div>
              <div class="mb-3">
                  <label for="">Duration of Working Time</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration of time" value="{{ $workingtime->duration }}">
                    <button class="btn btn-warning" type="button">Calculate</button>
                  </div>
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