<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('Home/images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('Home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('Home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('Home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      {{-- <div class="hero_area"> --}}
         <!-- header section strats -->
            @include("home.header")
         <!-- end header section -->
     {{-- </div> --}}

<div class="container my-3">


    <div class="row">
        <x-message.error/>

        <x-message.home.success/>



    <table class="table table-bordered table-hover">
        <thead class="thead-dark">

          <tr>
            <th>sl</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>


          </tr>
        </thead>
        <tbody>
            @php
                $totalprice=0;
            @endphp
            @foreach ($carts as $cart )
            <tr style="line-height:75px">
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td><img height="150" width="100" src="{{customclass::url_product_photo($cart->image)}}" alt=""></td>
                <td>
                    {{-- delete_cart use for click event  --}}
                    <a href="#" class="delete_cart" data-toggle="modal" data-target="#delete_home_modal"
                   data-id="{{$cart->id}}"
                    data-product_title="{{$cart->product_title}}"
                    data-quantity="{{$cart->quantity}}"
                    data-price="{{$cart->price}}"
                    data-image="{{$cart->image}}"

                    ><i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i></a>
                </td>
              </tr>

              @php
                  $totalprice=$totalprice+ ($cart->quantity * $cart->price)
              @endphp
            @endforeach
            <tr class="table-active">
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td  style="font-size: 25px; text-align:right" ><strong>Total Price</strong></td>
                <td  style="font-size: 30px; text-align:center" >
                    <strong>{{$totalprice}}</strong>
                </td>
              </tr>
        </tbody>

      </table>

    </div>
{{-- end div 1st row --}}

    <div class="row my-3">
        <div class="col-md-12 text-center">
            {{-- <form action="{{Route('stripe')}}" method="post"> --}}

                {{-- @csrf --}}
        <div class="form-group text-center">
            <label class="control-label col-md-12 text-lg"> Process To Order </label>
            <a href="{{Route('order_cash')}}" class="btn btn-primary col-md-3">Cash on Delivery</a>
                {{-- <input type="hidden" value="{{$totalprice}}" name="totalprice"/>
            <button type="submit" class="btn btn-danger col-md-3">Pay Using Card</button> --}}
            <a href="{{Route('stripe_show',$totalprice)}}" class="btn btn-danger col-md-3">Pay Using Card</a>

        </div>

        {{-- </form> --}}
        {{-- <a href="test" class="btn btn-primary col-md-3">Cash on Delivery</a> --}}

    </div>
    </div>

@include("home.modal.delete",["type"=>"cart"])

</div>
{{-- end div container --}}
      <!-- end client section -->
      <!-- footer start -->
      @include("home.footer")

      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('Home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('Home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('Home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('Home/js/custom.js')}}"></script>



      <script>
        $(document).ready(function(){

                $(".delete_cart").click(function(){
                    let value=$(this)
                    let id=$(value).data("id")
                    let product_title=$(value).data("product_title")
                    let quantity=$(value).data("quantity")
                    let price=$(value).data("price")
                    let image="/images/" + $(value).data("image")

                    $(".del_id").val(id)
                    $(".product_title").val(product_title)
                    $(".quantity").val(quantity)
                    $(".price").val(price)
                    $(".image").attr("src",image);









                })

                $("#myalert").fadeTo(5000, 100).slideUp(500, function(){
    $("#myalert").slideUp(100);
});


        })
      </script>
   </body>
</html>
