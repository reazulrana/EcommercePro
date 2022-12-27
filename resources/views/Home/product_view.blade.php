
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


      <!-- product section -->



      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>

           <div class="row">
          <form class="form-horizontal" method="POST" action="{{Route('product_search_peoduct_view')}}">
            @csrf
            <div class="col-md-12">
                <label class="control-label">Search Product</label>
                <input class="form-control" name="search_product" placeholder="Search for the product" style="margin:0" />
                <button class="btn btn-primary btn-sm col-md-6">Search</button>
            </div>
        </form>

        <form action="{{Route('prod_paginate_product_view')}}" method="POST" class="form-horizontal">
          @csrf
            <div class="col-md-12">
                <label class="control-label">Total Product Show</label>
                <select name="ttlrow" class="form-control">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">20</option>

                </select>
                <button type="submit" class="btn btn-primary btn-sm col-md-6">Show</button>
            </div>
                </form>

           </div>
           <div class="row">
            <div class="col-md-2">

            </div>
           </div>
           <div class="row">
            @foreach ($products as $product )
              <div class="col-sm-6 col-md-4 col-lg-4">
                 <div class="box">
                    <div class="option_container">
                       <div class="options">
                        <div class="row">
                          <a href="{{Route('product_details',$product->id)}}" class="option1">
                            Product Details
                          </a>
                    </div>


                          <form action="{{Route('add_cart')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <input  type="hidden" name="id" value="{{$product->id}}"/>
                                <input class="btn btn-primary btn-sm" style="border-radius: 30px" type="submit" value="Add to Cart"/>
                            </div>
                            <div class="row">
                                <input class="form-control col-md-9 ml-4" type="number" name="quantity" value="1" min="1"/>

                            </div>
                          </form>
                       </div>
                    </div>
                    <div class="img-box">
                       <img src="/images/{{$product->image}}" alt="">
                    </div>

                    <div class="detail-box">
                       <h5>
                      {{$product->title}}
                       </h5>

                     <h6 class="text-primary">
                        @if ($product->discount_price!="0")
                        <del>${{$product->price}}</del>
                        @else
                        ${{$product->price}}
                        @endif
                     </h6>

                    </div>

                    <div class="detail-box">
                        @if ($product->discount_price!="0")
                        <h5>
                            Offer Price
                        </h5>
                        <h6 class="text-danger">
                         ${{$product->discount_price}}
                        </h6>
                      @endif
                     </div>

                 </div>
              </div>
              @endforeach
            </div>

        </div>


       {{-- start pagination row --}}

         <div class="row mt-3 px-3">
        <div class="col-md-12">
          {!!$products->withQueryString()->links("pagination::bootstrap-5")!!}
        </div>
       </div>

       {{-- endof pagination row --}}
       <div class="btn-box">
          <a href="/">
          View All products
          </a>
       </div>
    </div>

 </section>

      <!-- end product section -->

     <!-- comment section -->
     @include("home.comment")
     <!-- end comment section -->


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
      @yield("js")
   </body>
</html>

