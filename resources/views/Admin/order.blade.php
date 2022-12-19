@extends("admin.home")

@section("content")

<div class="row">
    <div class="col-12">
        <x-message.error/>
        <x-message.success/>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Category Table</h4>
                <form action="{{Route('search_order')}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="search_order">

                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Search" class="btn btn-info text-black-50">
                            <a href={{Route('order_show')}} class="btn btn-primary">Show All</a>

                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>

                </form>


                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Image</th>
                                <th>Action</th>




                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order )
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$order->name}}</td>
<td>{{$order->email}}</td>
<td>{{$order->address}}</td>
<td>{{$order->phone}}</td>
<td>{{$order->product_title}}</td>
<td>{{$order->quantity}}</td>
<td>{{$order->price}}</td>
<td>
    @if($order->payment_status=="Paid")
  <span class="badge badge-success py-2">    {{$order->payment_status}}</span>

    @else
    {{$order->payment_status}}
    @endif
</td>
<td>
    @if($order->delivery_status=="delivered")
  <span class="badge badge-success py-2">{{$order->delivery_status}}</span>
    @else
    {{$order->delivery_status}}

    @endif

</td>
<td><img height="150" width="100" src="/images/{{$order->image}}"/></td>
<td>
    @if($order->delivery_status!="delivered")
    <form action="delivered" method="Post">
        @csrf
        <input type="hidden" value="{{$order->id}}" name="orderid"/>
        <button type="submit" class="btn btn-success text-black-50 btn-block">Delivered</button>
    </form>
    @else
    <h4 class="h4">Delivered</h4>
    @endif


    <a href="{{Route('print_pdf',$order->id)}}" class="btn btn-primary btn-block">Print PDF</a>

    <a href="{{Route('send_email',$order->id)}}" class="btn btn-info btn-block">Send Email</a>

</td>


</tr>
    @empty
    <tr>
        <td colspan="12">
            <p>Data Not Found</p>
        </td>
    </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                {{-- {!!$orders->withQueryString()->links("pagination::bootstrap-5")!!} --}}
            </div>
        </div>
    </div>
</div>

{{-- end table row --}}

{{-- @include("admin.modal.delete_data",["type"=>"Product"])
@include("admin.modal.update_product",$category) --}}

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
