@extends('website.app')
@section('content')

<style>
    .blog-section .disabled {
        display: block!important;
    }
</style>

  <!-- ========================  Header content ======================== -->
<section class="header-content w3-display-container">

    <div class="w3-padding w3-display-topmiddle search-container" style="top: 65%;z-index: 10;width: 80%;display: none" >
        <center class=" w3-animate-top" >
            <form method="get" action="{{ url('shop') }}" class="form-inline" >
            <div class="form-group" style="width: 60%"> 
                <input type="text" name="search" class="form-control" required="" style="width: 100%!important" placeholder="{{ __('search about product') }}">
              </div> 
            <button type="submit" class="btn btn-default">{{ __('search') }}</button> 
        </form>
        </center>
        
    </div> 
<div class="owl-slider owl-carousel owl-theme home-carsousel">

    <!-- === slide item === -->

    @foreach($slides as $slide)

                <div class="item w3-display-container" style="background-image:url({{ $slide->url }});background-size: cover;width: 100%!important">
                    <div class="box">
                        <div class="container">
                            <span class="hidden" >{{ session("locale") }}</span>
                            <h2 class="title animated h1 hidden" data-animation="fadeInDown" style="text-shadow: 2 1 5px black" >
                                {{ (session('locale') == 'En')? $slide->title_en : $slide->title_ar }}
                            </h2> 
                            <center>
                                <br>
                                <br>
                                <a 
                                    href="{{ url('/shop') }}"
                                    class="animated w3-padding text-uppercase w3-white w3-padding w3-card w3-button"  
                                    data-animation="fadeInUp" 
                                    style="max-width: 150px;font-family: arial,sans-serif;color: #222323" >
                                    {{ __('shop now') }} <i class="fa fa-long-arrow-right" ></i>
                                </a>
                            </center>
                            <!--
                            <div class="animated" data-animation="fadeInUp">
                                <a href="https://themeforest.net/item/mobel-furniture-website-template/20382155" target="_blank" class="btn btn-main" ><i class="icon icon-cart"></i> Buy this template</a>
                            </div>
                            
                            -->
                        </div>
                    </div>
                </div>
    @endforeach
     
 

 
</div> <!--/owl-slider-->
</section>

<!-- ========================  Icons slider ========================frontpage -->

<section class="owl-icons-wrapper owl-icons-">

<!-- === header === -->

<header class="hidden">
    <h2> {{__('Product categories')}}</h2>
</header>

<div  style="background-image: url({{ url('/image/category-header.jpg') }});background-size: cover;max-height: 160px!important"> 
    <div class="owl-icons owl-carousel owl-theme blog-carsousel w3-block " style="max-height: 160px!important;background-color: rgba(0,0,0,.2)" >

     

        <!-- === icon item === -->
        @foreach($categories as $category)
        <a href="{{ url('shop?category_id=') }}{{ $category->id }}" class="item w3-center" style="background-color: rgba(0,0,0,0.5)"  >
            <center>
                <figure>
            
             <img  src="{{ asset('images/category') ."/". $category->photo }}" style="height: 50px; width: 50px" alt="">
             <b class="w3-text-white text-center" >
                 <center>
                     @if(session('locale') == 'En')
                <figcaption>{{$category->name_en}}</figcaption>
             @else
             <figcaption>{{$category->name_ar}}</figcaption>
           
             @endif
                 </center>
             </b>

            </figure>
            </center>
        </a>
        @endforeach

      

    </div> <!--/owl-icons-->
</div> <!--/container-->
</section>

<!-- ========================  Products widget ======================== -->

<section class="products">

<div class="container">

    <!-- === header title === -->

    <header>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">
                <h2 class="title"> {{__('Popular products')}}</h2>
                <div class="text">
                    <p> {{__('Check out our latest collections')}}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="row">

        <!-- === product-item === -->

      

        <!-- === product-item === -->
        <div class="owl-carousel owl-theme blog-carsousel blog-section">
             @foreach($products as $product)
                     <div class="item" style="padding: 5px"  >
                                               
                                                    
                        <article onclick="window.location='{{route('show.product',$product->id)}}'"  style="cursor: pointer" >
                            
                            @if ($product->canSold())
                            <div class="btn btn-add">
                                <a href="{{route('add.cart.product',$product->id)}}">  <i class="icon icon-cart"></i></a>   
                            </div>
                            @endif
                            
                            <div class="figure-grid">

                                
                                <div class="image" >
                                                  
                                    @if ($product->photos()->first())
                                    <a href="{{route('show.product',$product->id)}}">                
                                        <div style="background-repeat:no-repeat;" >

                                            <img class="" src="{{ $product->photos()->first()->url }}" style="height:300px;!important;width: auto!important" onmousedown="$('.product-modal-{{ $product->id }}').show()"  >

                                        </div>
                                    </a>
                                    @endif
                                    
                                    <div>

                                    @if(session('locale') == 'En')
                                        <center class="w3-padding" >
                                            <a class="w3-"  href="{{route('show.product',$product->id)}}">
                                                {{$product->name_en}}
                                            </a>
                                            <br>
                                             
                                                    @if ($product->price_ar_discount != null || $product->price_ar_discount > 0)
                                                    <b class="w3-large font-1 w3-text-red" style="text-decoration: line-through;" >EGP {{$product->price_ar}}</b>
                                                    <br> 
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar_discount}}</b>
                                                    @else

                                                    @if ($product->price_ar > 0)
                                                    <br>  
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar}}</b>
                                                    @else
                                                    <b class="w3-large font-1 w3-text-red" >-</b><br>
                                                    <b class="w3-large font-1 w3-text-green" >-</b>
                                                    @endif
                                                    @endif
                                        </center>

                                    @else

                                    <center class="w3-padding" >
                                            <a class="w3-"  href="{{route('show.product',$product->id)}}">
                                                {{$product->name_ar}}
                                            </a>
                                            <br>
                                            
                                                    @if ($product->price_ar_discount != null || $product->price_ar_discount > 0)
                                                    <b class="w3-large font-1 w3-text-red" style="text-decoration: line-through;" >EGP {{$product->price_ar}}</b>
                                                    <br> 
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar_discount}}</b>
                                                    @else

                                                    @if ($product->price_ar > 0)
                                                    <br> 
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar}}</b>
                                                    @else
                                                    <b class="w3-large font-1 w3-text-red" >-</b><br>
                                                    <b class="w3-large font-1 w3-text-green" >-</b>
                                                    @endif
                                                    @endif
                                        </center>
                                    @endif
                                    </div>
                                                    
                                </div>
                  
                            </div>
                        </article>
                                                
                    </div>

         @endforeach
         </div>
        
    </div> <!--/row-->
    <!-- === button more === -->

  

    <!-- ========================  Product info popup - quick view ======================== -->

</div> <!--/container-->
</section>

<!-- ========================  Stretcher widget ======================== -->



<!-- ========================  Blog Block ======================== -->

<section class="blog blog-block">

<div class="container">

    <!-- === blog header === -->

    <header>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 text-center">
                <h2 class="title"> {{__('Interior ideas')}}</h2>
                <div class="text">
                    <p> {{__('Keeping things minimal')}}</p>
                </div>
            </div>
        </div>
    </header>

        <div class="owl-carousel owl-theme blog-carsousel blog-section">

        <!-- === blog item === -->
   @foreach($ideas as $idea)
       
        <div class="item">
            <article>
                <a  >

                  <div style="background-repeat:no-repeat;" >

                    <img class="" src="{{ asset('images/idea') ."/". $idea->photo }}" style="height:400px!important;width:auto!important;"   >

                  </div>
                   
                    <div class="entry entry-block">
                      
                        <div class="description">
                        @if(session('locale') == 'En')
                            <p>
                           {{$idea->description_en}}
                            </p>
                        @else
                            <p>
                            {{$idea->description_ar}}
                            </p>

                        @endif
                        </div>
                    </div>
                   
                </a>
            </article>
        </div>
    @endforeach

        <!-- === blog item === -->

    </div> <!--/row-->
    <!-- === button more === -->

    

</div> <!--/container-->
</section>

     

        <!-- ========================  Banner ======================== -->

        <section class="banner" style="background-image:url(website/assets/images/about.png)">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title"> {{__('Our story')}}</h2>
                        <p>{{__('Our story description')}}</p>
                       
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================  Blog ======================== -->

        <section class="blog">

            <div class="container">

                <!-- === blog header === -->

                <header>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 text-center">
                            <h1 class="h2 title">  {{__('Blog')}} </h1>
                            <div class="text">
                                <p> {{__('Blog description')}}</p>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="row">
                    <div class="owl-carousel owl-theme blog-carsousel blog-section">
                    @foreach($blogs as $blog)
  
                    <div class="item">
                        <article>
                            <a href="{{$blog->link}}">
                               <img  src="{{ $blog->url }}" style="height: 200px; width: auto;" alt="">   
                                <div class="entry entry-table">
                                    
                                    <div class="title">
                                    @if(session('locale') == 'En')
                                     <h2 class="h5">  {{$blog->description_en}}</h2>
                                    @else
                                    <h2 class="h5">  {{$blog->description_en}}</h2>
                                    @endif
                                    </div>
                                </div>
                                </a>
                        </article>
                    </div>
                    
                    @endforeach
                    </div>
                    <!-- === blog item === -->
                     

                    <!-- === blog item === -->
                 </div> <!--/row-->
                <!-- === button more === -->

           
            </div> <!--/container-->
        </section>

       

        
<section class="owl-icons-wrapper owl-icons-frontpage" style="padding:5px !important;margin:5px !important;">
<center><h2 style="color:black;">  {{__('instagram')}} </h2></center> 


<div class="container">

  
<div class="owl-carousel owl-theme blog-carsousel">
                      

        <!-- === icon item === -->
       @foreach($instagrams as $insta)
         <a class="item w3-padding" href="{{$insta->link}}">
            <figure style="padding:5px !important;margin:5px !important;">
            
              <img  src="{{ asset('images/instagram') ."/". $insta->photo }}" style="height:200px;width:200px;" alt="">
         
            

            </figure>
        </a>
        @endforeach

      

    </div> <!--/owl-icons-->
</div> <!--/container-->
</section>






        <!-- ========================  Instagram ======================== -->

     




@endsection