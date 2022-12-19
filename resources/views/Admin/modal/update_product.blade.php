  <!-- Modal -->
  <div class="modal fade" id="productupdatemodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{Route('update_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="title" class="control-label">title</label>
                        <input type="text"  class="form-control title" id="title" name="title"  required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">description</label>
                        <input type="text" class="form-control description" id="description" name="description" required>
                    </div>

                <x-dropdown name="category" labeltitle="Category" fieldname="catagory_name" val="catagory_name" :items="$category"/>

                    <div class="form-group">
                        <label for="quantity" class="control-label">quantity</label>
                        <input type="number" class="form-control quantity" id="quantity" name="quantity" >
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label">price</label>
                        <input type="number" class="form-control price" id="price" name="price" >
                    </div>

                    <div class="form-group">
                        <label for="discount_price" class="control-label">discount price</label>
                        <input type="number" class="form-control discount_price" id="discount_price" name="discount_price" >
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <img class="img-fluid oldimage" src="" name="oldimage">
                            <input type="hidden"  class="form-control old_image_name" id="old_image_name" name="old_image_name"  required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" id="image" name="image" >

                    </div>

                    </div> {{-- col end --}}
                    </div> {{-- Row end --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-black-50" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success text-black-50">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
