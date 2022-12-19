@extends("admin.home")

@section("content")

<div class="row">
    <div class="col-12">
        <x-message.error/>
        <x-message.success/>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Table</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Product Image</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product )

                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->catagory}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td><img src="/Images/{{$product->image}}"/></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#productupdatemodal"  class="btn btn-primary btn_edit_product"
                                    data-id="{{$product->id}}"
                                    data-title="{{$product->title}}"
                                    data-description="{{$product->description}}"
                                    data-quantity="{{$product->quantity}}"
                                    data-catagory="{{$product->catagory}}"
                                    data-price="{{$product->price}}"
                                    data-discount_price="{{$product->discount_price}}"
                                    data-image="{{$product->image}}"
                                    >Edit</a>
                                    <a href="#" data-toggle="modal" data-target="#deletemodal" class="btn btn-danger text-white btn_delete_product"
                                    data-id="{{$product->id}}"
                                    data-title="{{$product->title}}"
                                    data-description="{{$product->description}}"

                                    data-category="{{$product->catagory}}"
                                    data-image="{{$product->image}}"
                                    >Delete</a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Title</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Product Image</th>
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

@include("admin.modal.delete_data",["type"=>"Product"])
@include("admin.modal.update_product",$category)

@endsection


@section("js")
<script>
    $(document).ready(function(){
$(".btn_delete_product").click(function(){
let data=$(this);
let url="/images/"
$(".del_id").val($(data).data("id"))
$(".del_data").val($(data).data("title"))
$(".del_data_1").val($(data).data("description"))
$(".del_data_2").val($(data).data("category"))
$(".del_img").attr("src",url+$(data).data("image"))



})

$(".btn_edit_product").click(function(){
let data=$(this)
let path="/Images/"+ $(data).data("image")
let catid=$(data).data("catagory")


    $(".id").val($(data).data("id"))
    $(".title").val($(data).data("title"))
    $(".description").val($(data).data("description"))
    $(".quantity").val($(data).data("quantity"))
    $(".price").val($(data).data("price"))
    $(".discount_price").val($(data).data("discount_price"))
    $(".oldimage").attr("src",path)

$(".old_image_name").val($(data).data("image"));


    // $(".category").val()
// this method is for Select option in select list

$(".category option").filter(function() {
return $(this).val() == catid;
}).prop('selected', true);



})

    })
</script>
@endsection
