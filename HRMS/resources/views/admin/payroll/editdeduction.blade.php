<div class="modal fade" id="editDeduction{{$deduction->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Deduction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('updateDeduction')}}" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" class="form-control" id="ID" name="ID" value="{{ $deduction->id }}">
                <div class="mb-3">
                    <label>Deduction</label>
                    <input type="text" class="form-control" id="deduct_item" name="deduct_item" value="{{ $deduction->deduct_item }}">
                </div>
                <div class="mb-3">
                    <label>Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $deduction->amount }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
          </form>
        </div> 
      </div>
    </div>
  </div>