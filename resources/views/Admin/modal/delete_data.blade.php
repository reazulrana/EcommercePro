  <!-- Modal -->
  <div class="modal fade" id="deletemodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{$type}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{Route('delete_data')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                            <input type="hidden" class="del_id" name="id">
                            <input type="hidden" class="del_table" name="type" value="{{$type}}" >
                            <div class="form-group">
                            <label class="control-label">{{$type}} Name</label>
                            <input type="text" class="form-control del_data"  name="name" readonly >
                            </div>

                            @if(@Str::lower($type) =="product")
                            <div class="form-group">
                            <label class="control-label">Description</label>
                            <input type="text" class="form-control del_data_1"  name="description" readonly >
                             </div>
                             <div class="form-group">

                            <label class="control-label">Category</label>
                            <input type="text" class="form-control del_data_2"  name="category" readonly >
                            </div>
                            <div class="form-group">
                            <div class="col-md-4">
                                <img class="del_img img-fluid" name="image" src=""/>
                            </div>
                            </div>

                            @endif


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-black-50" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger text-black-50">Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
