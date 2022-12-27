@extends("Admin.home")

@section("content")

<div class="row">
<div class="col-md-12">
    <x-message.error/>
    <x-message.success/>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title">Add Product</h5>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
    </div>
    <div class="card-body">
        <form action="{{Route("add_product")}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- component consist of two tag label and input and dynamic property will
                parameters $labeltitle, $type, $placeholder, $name, $labelclass, $inputclass
                (label property = $labeltitle and $labelclass)
                (inpub = $type, $placeholder, $name, $inputclass) --}}
<div class="row">
    <div class="col-md-6">
                <x-input labeltitle="product title"  type="text" placeholder="Enter product title" name="title" labelclass="control-label" inputclass="form-control"/>
                <x-input labeltitle="product description"  type="text" placeholder="Enter product description" name="description" labelclass="control-label" inputclass="form-control"/>
                <x-input labeltitle="product price"  type="number" placeholder="Enter product price" name="price" labelclass="control-label" inputclass="form-control"/>
                <x-input labeltitle="discount price"  type="number" placeholder="Enter discount price if apply" name="dis_price" labelclass="control-label" inputclass="form-control"/>

            </div> {{-- col end --}}
            <div class="col-md-6">
                <x-input labeltitle="product quantity"  type="number" placeholder="Enter product quantity" name="quantity" labelclass="control-label" inputclass="form-control"/>
                <x-dropdown name="category" labeltitle="Category" fieldname="catagory_name" val="catagory_name" :items="$category"/>
                <x-input labeltitle="product image here"  type="file" placeholder="" name="image" labelclass="control-label" inputclass="form-control"/>
                <div class="form-group">
                    <label class="control-label text-white">sdad</label>
                    <button type="submit" class="btn btn-success bg-success col-md-4">Add product</button>
                </div>
                {{-- <x-input  labeltitle="" placeholder="" labelclass=""  type="submit" name="btnadd"   inputclass="btn btn-success btn-block" value="Add Product"/> --}}

            </div> {{-- col end --}}
        </div> {{-- Row end --}}


        </form>
    </div>
    <div class="card-footer">
        {{-- <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small> --}}
        </p><a href="#" class="card-link float-right"><small>Card link</small></a>
    </div>
</div>
</div>
</div>

{{-- card row end  --}}



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Details</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- end table row --}}


@include("Admin.modal.delete_data",["type"=>"Category"])
@endsection


@section("js")
<script>
    $(document).ready(function(){
$(".btn_delete").click(function(){
var data=$(this);
$(".del_id").val($(data).data("id"))
$(".del_data").val($(data).data("dataname"))


})
    })
</script>

@endsection
