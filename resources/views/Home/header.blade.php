<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="{{asset('Home/images/logo.png')}}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="{{Route('show_about')}}">About</a></li>
                      <li><a href="{{Route('testimonial')}}">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{Route('product_view')}}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{Route('blog_view')}}">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>

                @if(Auth::id())
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('show_user_order')}}">Order</a>
                 </li>
                @endif

                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>
                 <li class="nav-item">
                    <a class="nav-link" href="{{Route('show_cart')}}"> <i title="Cart" class="fa fa-shopping-cart" style="color: crimson;font-size:25px" aria-hidden="true"></i></a>
                 </li>




                 @if (Route::has('login'))
                 @auth
                 <x-app-layout>
                </x-app-layout>
                 @else
                 <li class="nav-item mr-1" >
                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                 </li>

                 <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                 </li>
                 @endauth
         @endif




             </ul>
          </div>
       </nav>
    </div>
 </header>
