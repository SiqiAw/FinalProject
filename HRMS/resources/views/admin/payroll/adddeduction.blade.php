<div class="modal fade" id="addDeduction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form form method="post" action="{{ route('addDeduction') }}" enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="">Deduction</label>
                <input type="text" class="form-control" name="deduct_item" placeholder="Enter deduction item" />      
            </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="text" class="form-control" name="amount" placeholder="" />      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>