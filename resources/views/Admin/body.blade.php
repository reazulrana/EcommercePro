@extends("admin.home")
@section("content")
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Product</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$products}}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-product-hunt"></i></span> --}}

                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Order</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$orders}}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Customers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$customers}}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Sold</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$sold}} -/</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span> --}}

                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span> --}}
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Order Delivered</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$delivered}}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Order Pricessing</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$processing}}</h2>
                                    {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                                </div>
                                {{-- <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span> --}}
                            </div>
                        </div>
                    </div>
                </div>

@endsection
