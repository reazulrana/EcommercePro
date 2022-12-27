  <!-- Modal -->
  <div class="modal fade" id="edit_testimonial_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{Route('update_Testimonial')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" class="id" name="id">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="title form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" id="sub_title" class="sub_title form-control" name="sub_title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="description form-control" id="description" rows="4" cols="30" name="description"></textarea>

                    </div>

                    <div class="form-group my-3 px-2">
                        <div class="row">
                        <div class="border-2 col-md-5">
                        <label for="previous_image">Previous Image</label>
                            <img height="150" id="previous_image" class="previous_image img-fluid" src="{{customclass::url_blank_photo()}}" />
                            <input type="hidden" class="pre_image" name="pre_image" value=""/>
                        </div>


                        <div class="col-md-5 border-2">
                            <label for="change_image">Change Image</label>
                             <img height="150" id="new_image" class="new_image img-fluid" src="{{customclass::url_blank_photo()}}" />
                             <input type="file" id="change_image_file" class="change_image_file form-control-file" name="change_image_file">
                         </div>
                    </div>
                    </div>




                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-danger" data-dismiss="modal"><i class="mdi mdi-close"></i> <span> Close</span></button>
                <button type="submit" class="btn btn-success bg-success"><i class="mdi mdi-update"></i> <span> Update</span></button>

            </div>
        </form>
        </div>
    </div>
</div>
