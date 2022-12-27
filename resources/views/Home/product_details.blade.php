
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
      <div class="hero_area">
         <!-- header section strats -->
            @include("home.header")
         <!-- end header section -->
        <div class="container my-5">
            <div class="card">
        <div class="card-header">
            <h5 class="card-title">Product Details</h5>
        </div>
        <div class="card-body">
         <div class="row">
            <div class="col-md-6 border-right">
                <img height="400px" width="350px" src="/images/{{$product->image}}"/>
            </div>
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                    <h3><b>{{$product->title}}</b></h3>
                    </div>

                </div>
                <hr/>

                {{-- start price --}}
                <div class="row">
                    <div class="col-md-6">
                    <h5 class="h5">Price</h5>
                    </div>
                    @if($product->discount_price>0)
                    <span><h5 title="Regular price" class="text-danger h5"><del>${{$product->price}}</del></h5> </span>
                     <h5 title="Discount price" class="text-primary h5"> <b>${{$product->discount_price}}</b></h5>
                    @else
                    <h5 title="Regular price" class="text-primary h5">${{$product->price}}</h5>
                    @endif
                </div>


                 {{-- start category --}}
                 <div class="row">
                    <div class="col-md-6">
                    <h6>Category</h6>
                    </div>
                    <h6><b>{{$product->catagory}}</b></h6>
                </div>

                     {{-- start description --}}
                     <div class="row">
                        <div class="col-md-6">
                        <h6 class="h6">Description</h6>
                        </div>
                        <h6 class="h6"><b>{{$product->description}}</b></h6>
                    </div>

                     {{-- start description --}}
                     <div class="row">
                        <div class="col-md-6">
                        <h6 class="h6">Quantity</h6>
                        </div>
                        @php
                        $font_color=""
                        @endphp
                        @if($product->description==0)
                            {{-- {{$font_color="danger"}} --}}
                            <h5 class="text-danger"><b>{{$product->quantity}}</b></h5>

                        @else
                        {{-- {{$font_color="success"}} --}}
                        <h5 class="text-success"><b>{{$product->quantity}}</b></h5>

                        @endif
                    </div>



                     {{-- start button --}}

                     <form action="{{Route('add_cart')}}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <input  type="hidden" name="id" value="{{$product->id}}"/>
                            <button class="btn btn-primary btn-sm"  type="submit"> Add to Cart </button>
                        </div>
                        </div>
                        <div class="row">
                            <input class="form-control col-md-9 ml-4" type="number" hidden name="quantity" value="1" min="1"/>

                        </div>
                      </form>

            </div>   {{-- end col-md-6 --}}
         </div>
        </div>
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
