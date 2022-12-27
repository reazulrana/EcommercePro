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
{{-- @dd($orders) --}}
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <x-message.error/>
                <x-message.home.success/>
                <table class="table table-responsive-md table-bordered">
                    <thead class="">
                        <th>Sl</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(!isset($orders))
                        <tr>
                            <td colspan="8">No Order Place</td>

                        </tr>
                        @else
                        @foreach($orders as $order)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img height="150" width="100" src="{{customclass::url_product_photo($order->image)}}" /></td>
                        <td>
                            <form method="Post" action="{{Route('cancel_order')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}"/>
                            @if($order->delivery_status=="processing")

                            <button onclick="return confirm('are you sure to cancel the order')" class="btn btn-primary btn-sm btn-block" value="cancelorder" name="cancelorder" >Cancel Order</button>

                            @elseif($order->delivery_status=="cancel order")

                            <button onclick="return confirm('are you sure to rollback the order cancel (note: if you rollback then will be the processing mode)')" value="rollback" class="btn btn-primary btn-sm btn-block" name="rollback">Rollback Cancel Order</button>

                            @endif
                            </form>

                        </td>
                    </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
      </div>

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
   </body>
</html>
