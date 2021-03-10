@php 
    if (!session("locale"))  {
        session(["locale" => "En"]); 
    }
    
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!--Title-->
    <title>{{__('title_website')}}</title>
    <!--CSS styles-->
    <link rel="stylesheet" media="all" href="{{ asset('website/css/bootstrap.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/animate.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/font-awesome.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/furniture-icons.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/linear-icons.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/magnific-popup.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/owl.carousel.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/ion-range-slider.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('website/css/theme.css') }}" />
    
    <link rel="stylesheet" media="all" href="{{ url('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" media="all" href="{{ url('css/owl.theme.default.min.css') }}" />
    
   
<!-- my style -->  
<link rel="stylesheet" href="{{ url('/') }}/css/iziToast.css"> 
        <!-- char style -->
        <link rel="stylesheet" href="{{ url('/') }}/css/chat.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/w3.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- char style -->
        <script src="{{ url('/') }}/bower_components/jquery/dist/jquery.min.js"></script> 
        <script>
            var SOUND_PATH = '{{ url("/audio/msg.mp3") }}';
            var QUESTIONS_URL = '{{ url("/chatbot/questions") }}';
            var public_path = "{{ url('/') }}";
        </script>
        
  <style type="text/css">
      

@media (min-width: 768px) and (max-width: 991px) {
  /* Show 3rd slide on md  if col-md-4*/
        .carousel-inner .active.col-md-4.carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }

}

@media (min-width: 576px) and (max-width: 768px) {
  /* Show 2 slide on md  if col-md-4*/
        .carousel-inner .active.col-sm-6.carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }

}
@media (min-width: 576px) {
  .carousel-item {
  margin-right: 0;
}

    /* show 2 items */
    .carousel-inner .active + .carousel-item {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item {
        transition: none;
    }

    .carousel-inner .carousel-item-next {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    } 
    
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}

/*MD*/
@media (min-width: 768px) {

    /* show 3rd of 3 item slide */
  .carousel-inner .active + .carousel-item + .carousel-item {
        display: block;
    }
 
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
        transition: none;
    }
  
    
    .carousel-inner .carousel-item-next {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    
    /* right or prev direction */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}


/*LG 6th*/
@media (min-width: 991px) {

    /* show 4th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    


    
    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}

/*LG 6th*/
@media (min-width: 991px) {

        /* show 5th and 6th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }

    
  
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
      transition: none;
    }

    
  
  /*show 7th slide for animation when its a 6 slides carousel */
       .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item  + .carousel-item {
        position: absolute;
        top: 0;
        right: -16.666666666%;
        z-index: -1;
        display: block;
        visibility: visible;
  }
  
      /* forward direction > */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
  
      /* prev direction < last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}



  </style>
    <link href="{{ asset('website/css/toaster.min.css') }}" rel="stylesheet">
    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    
    
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Text+Me+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    
    <!-- my style -->
    <link rel="stylesheet" href="{{ url('/') }}/css/w3.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .font-1 {/*
            font-family: 'Text Me One', sans-serif!important;*/
            font-family: consolas!important;
        }
        
        .font-2 {
            font-family: 'Cairo', sans-serif!important;
        }
        
        .navbar-dropdown {
            top: 78px!important;
        }
        
        .container, .row {
            width: 100%!important;
        }
        
        .navbar-fixed, .navigation-top {
                background-color: transparent!important;
        }
        
        .scroll-top {
            display: none!important;
        }
        
        .navbar-sticked {
            background-color: gray!important;
        }
    </style>
  

</head>

<body>

    <div class="page-loader"></div>

    <div class="wrapper">

        <!--Use class "navbar-fixed" or "navbar-default" -->
        <!--If you use "navbar-fixed" it will be sticky menu on scroll (only for large screens)-->

        <!-- ======================== Navigation ======================== -->

        <nav class="navbar-fixed"  >

            <div class="container" style="position: relative!important" >

                <!-- ==========  Top navigation ========== -->

                <div class="navigation navigation-top clearfix">
                    <ul>
                        <!--add active class for current page-->

                         <li><a href="https://www.facebook.com/nogal.furniture/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/nogal.furniture/"><i class="fa fa-instagram"></i></a></li>
                      
                        <!--Currency selector-->

                      

                        <!--Language selector-->

                        <li class="nav-settings">
                            <a href="javascript:void(0);" class="nav-settings-value">
                            {{__('Language_website')}}</a>
                            <ul class="nav-settings-list">
                               <a href="{{ url('locale/En') }}"> <li>ENG</li>
                               </a>

                               <a href="{{ url('locale/Ar') }}"> <li>العربيه</li>
                               </a>
                                
                               
                               
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
                        <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span>{{count(\App\Cart::all())}}</span></a></li>
                    </ul>
                </div> <!--/navigation-top-->

                <!-- ==========  Main navigation ========== -->

                <div class="navigation navigation-main" style="position: initial!important" >

                    <!-- Setup your logo here-->
                  
                    <a href="{{ url('/') }}" class="logo"><img src=  "{{ asset('website/assets/images/logo.png') }}" style="width:120px;height:70px;" alt="" /></a>

                    <!-- Mobile toggle menu -->

                    <a href="#" class="open-menu" style="margin-top: 10px;font-size: 20px!important"  ><i class="icon icon-menu"></i></a>

                    <!-- Convertible menu (mobile/desktop)-->

                    <div class="floating-menu">

                        <!-- Mobile toggle menu trigger-->

                        <div class="close-menu-wrapper">
                            <span class="close-menu" style="padding-top: 20px" ><i class="icon icon-cross"></i></span>
                        </div>

                        <ul style="padding:25px;">
                            <li><a href="{{route('website.home')}}"> {{__('home')}}</a></li>
                            
                            <!-- Multi-content dropdown -->
    

                        

                            <!-- Furniture icons in dropdown-->

                    

                                        
                                        
                                        
                                   
                            
                            <li>
                                <a href="#" onclick="$(this).parent().find('.navbar-dropdown').slideToggle(300)" > {{__('category')}} <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                <div class="navbar-dropdown navbar-dropdown-single">
                                    <div class="navbar-box">

                                        <!-- box-2 (without 'box-1', box-2 will be displayed as full width)-->

                                        <div class="box-2">
                                            <div class="box clearfix">
                                                <ul>
                                                    @foreach(\App\Category::orderBy('created_at', 'asc')->get() as $category)
                                                     @if(session('locale') == 'En')
                                                      <li><a href="{{ url('shop?category_id=') }}{{ $category->id }}">{{$category->name_en}}</a></li>
                                                     @else
                                                     <li><a href="{{ url('shop?category_id=') }}{{ $category->id }}">{{$category->name_ar}}</a></li>
                                                     @endif
                                                    @endforeach
                                                </ul>
                                              
                                            </div> <!--/box-->
                                        </div> <!--/box-2-->
                                    </div> <!--/navbar-box-->
                                </div> <!--/navbar-dropdown-->
                            </li>
                            
                         

                            
                            <li><a href="{{route('website.about')}}"> {{__('about')}}</a></li>
                            <li><a href="{{route('website.contact')}}"> {{__('contact')}}</a></li>
                            
                             
                            <li>
                                <a href="#" onclick="$(this).parent().find('.navbar-dropdown').slideToggle(300)" > {{__('outlet')}} <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                <div class="navbar-dropdown navbar-dropdown-single">
                                    <div class="navbar-box">

                                        <!-- box-2 (without 'box-1', box-2 will be displayed as full width)-->

                                        <div class="box-2">
                                            <div class="box clearfix">
                                                <ul>
                                                    @foreach(\App\Category::whereIn('id', [5, 7, 13])->orderBy('created_at', 'asc')->get() as $category) 
                                                     @if(session('locale') == 'En')
                                                      <li><a href="{{ url('shop?category_id=') }}{{ $category->id }}">{{$category->name_en}}</a></li>
                                                     @else
                                                     <li><a href="{{ url('shop?category_id=') }}{{ $category->id }}">{{$category->name_ar}}</a></li>
                                                     @endif
                                                    @endforeach
                                                </ul>
                                              
                                            </div> <!--/box-->
                                        </div> <!--/box-2-->
                                    </div> <!--/navbar-box-->
                                </div> <!--/navbar-dropdown-->
                            </li>
                            
                           

                            <!-- Simple menu link-->

                          
                             @if(!Auth::user())

                            <li><a href="{{route('register')}}"> {{__('register')}}</a></li>
                            
                            
                            @endif
                            
                            <li><a href="#" onclick="$('.search-container').toggle()" > <i class="fa fa-search" ></i></a></li>
                            
                        </ul>
                    </div> <!--/floating-menu-->
                </div> <!--/navigation-main-->

                <!-- ==========  Search wrapper ========== -->

             

                <!-- ==========  Login wrapper ========== -->

                <div class="login-wrapper">
                @if(!Auth::user())

                <form action="{{route('website.login')}}" method="POST">
                <div class="h4"> {{__('sign_in')}}</div>
                        {{ csrf_field() }}

                                        
                    <div class="form-group">
                     <input type="text" value="" name="email" id="email" class="form-control" placeholder="{{__('email')}}">
                    </div>
                                      

                                       
                    <div class="form-group">
                      <input type="password" value="" id="password" name="password" class="form-control" placeholder="{{__('password')}}">
                    </div>
                                       

                   
                      
                        <button type="submit" class="btn btn-block btn-main">{{__('submit')}}</button>
                    </form>
                    @else
                    <button type="submit" class="btn btn-block btn-main"><a href="{{ url('/') }}/website/logout"  class="btn w3-red w3-round shadow btn-sm ">{{__('logout')}}</a></button>
                  
                   
                    
                 
                    @endif
                </div>



                
                <!-- ==========  Cart wrapper ========== -->

                <div class="cart-wrapper">
                    <div class="checkout">
                        <div class="clearfix">

                            <!--cart item-->

                            <div class="row">

                            @foreach(\App\Cart::all() as $key => $amount)
                            @php 
                                $product = App\Product::find($key);
                            @endphp

                                <div class="cart-block cart-block-item clearfix">
                                    <div class="image">
                                    @if ($product->photos()->first())
                                    <a href="{{route('show.product',$product->id)}}">
                                        <img   src="{{  $product->photos()->first()->url }}" style="width:200px; height:150px;"   alt="">
                                               
                                    </a>
                                 @endif   
                                 </div>
                                 <div class="title">
                                 @if(session('locale') == 'En')
                                        <div><a href="product.html">{{$product->name_en}}</a></div>
                                        <small>{{$product->category->name_en}}</small>

                                @else
                                <div><a href="product.html">{{$product->name_ar}}</a></div>
                                <small>{{$product->category->name_ar}}</small>

                               


                                @endif
                                    </div>
                                    <div class="quantity">
                                        <input type="number" value="{{$amount}}" style="min-width: 100px!important"  class="form-control " disabled />
                                    </div>
                                    <div class="price">
                                        <span class="final"> EGP {{$product->price_ar}}</span>
                                     
                                    </div>
                                    <!--delete-this-item-->

                                    <a href="{{route('remove.from.cart',$product->id)}}">
                                    <span class="icon icon-cross icon-delete"></span>
                                    </a>
                                </div>

                                @endforeach
                            </div>

                            <hr />

                           

                            <!--cart final price -->

                            <div class="clearfix">
                                <div class="cart-block cart-block-footer clearfix">
                                    <div>
                                        <strong>{{__('total')}}</strong>
                                    </div>
                                    <div>
                                        <div class="h4 title">EGP {{\App\Cart::getTotal()}}</div>
                                    </div>
                                </div>
                            </div>


                            <!--cart navigation -->

                            <div class="cart-block-buttons clearfix">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="{{route('website.shop')}}" class="btn btn-clean-dark">{{__('continue_shopping')}}</a>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                      <!--cart navigation -->
                                        <a href="{{route('website.checkout1')}}" class="btn btn-main"><span class="icon icon-cart"></span> {{__('checkout')}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> <!--/checkout-->
                </div> <!--/cart-wrapper-->

                <!-- ==========  Cart wrapper ========== -->

            </div> <!--/container-->
        </nav>
