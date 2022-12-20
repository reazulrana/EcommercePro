  <!-- Modal -->
  <div class="modal fade" id="edit_reply_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Reply</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{Route('update_reply')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="reply_id" name="reply_id">
                        <label for="edit_reply">Modify Reply</label>
                        <input type="text" id="edit_reply" class="edit_reply form-control" name="edit_reply">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary bg-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success bg-success btn-sm">Update</button>

            </div>
        </form>
        </div>
    </div>
</div>
