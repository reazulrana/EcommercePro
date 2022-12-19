<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @foreach ($products as $product )


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{Route('product_details',$product->id)}}" class="option1">
                        Product Details
                      </a>
                      <form action="{{Route('add_cart')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 ml-2">
                            <input  type="hidden" name="id" value="{{$product->id}}"/>

                            <input class="form-control" type="number" name="quantity" value="1" min="1"/>
                        </div>
                        <div class="col-md-7">

                            <input class="btn btn-primary" style="border-radius: 30px" type="submit" value="Add to Cart"/>
                        </div>

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
          <div class="m-2">
          {!!$products->withQueryString()->links("pagination::bootstrap-5")!!}
       </div>
        </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>

 </section>
