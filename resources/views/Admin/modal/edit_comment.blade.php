  <!-- Modal -->
  <div class="modal fade" id="edit_comment_emodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Comments</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{Route('Update_Comment')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="comment_id" name="comment_id">
                        <label for="edit_comment">Modify Comment</label>
                        <input type="text" id="edit_comment" class="edit_comment form-control" name="edit_comment">
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
