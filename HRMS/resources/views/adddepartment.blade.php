<div class="modal fade" id="addDept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addDept') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Department Name</label>
                <input class="form-control" name="department_name" placeholder="Enter department name" />      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Department</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>