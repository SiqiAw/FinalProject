<form method="post" action="{{route('updateDept')}}" enctype="multipart/form-data">
  @csrf 
  <div class="modal fade" id="editDept{{$department->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <div class="mb-3">
                  <label>Department ID</label>
                  <input type="text" class="form-control" id="ID" name="ID" value="{{ $department->id }}">
              </div>
              <div class="mb-3">
                  <label>Department Name</label>
                  <input type="text" class="form-control" id="department_name" name="department_name" value="{{ $department->department_name }}">
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