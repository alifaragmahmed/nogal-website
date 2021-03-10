@extends('website.app')
@section('content')
<style>
    .loupe {
        z-index: 999999!important;
        border-radius: 16em!important;
    }
</style>

    <!-- ======================== Main header ======================== -->

      <section class="banner" style="background-image:url(website/assets/images/about.png)">
            <header>
                <div class="container">
                    <h1 class="h2 title"> {{__('Shop')}}</h1>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href=""><span class="icon icon-home"></span></a></li>
                        <li><a href=""> {{__('Product Category')}}</a></li>
                       
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Icons slider ======================== -->


        <!-- ======================== Products ======================== -->

        <section class="products">
            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title"> {{__('Product category grid')}}</h3>
                </header>

                <div class="row">

                    <!-- === product-filters === -->

                    <div class="col-md-3 col-xs-12">
                        <div class="filters">
                            <!--Price-->
                            <div class="filter-box active">
                                <div class="title"> {{__('Price')}}</div>
                                <div class="filter-content">
                                    <div class="price-filter">
                                    <form action="{{route('website.shop')}}" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="from" class="form-control" placeholder="{{__('From')}}">
                                    </div>
                                    <input type="text" name="to" class="form-control" placeholder="{{__('To')}}">
                                    </br>
                                  <label> {{__(' Category')}}</label>
                                    <select   name="category_id"  class="form-control">
                                    @foreach($categories as $category)
                                       @if(session('locale') == 'En')  
                                            <option value="{{ $category->id }}">{{$category->name_en}}</option>
                                      @else
                                      <option value="{{ $category->id }}">{{$category->name_ar}}</option>
                                     
                                      @endif
                                    @endforeach
                                    </select>
                                    </br>
                                    <center >
                                    <button  type="submit" class=" text-center btn btn-default">{{__(' Search With Price')}}</button>
                               
                                    </center>
                                    </form>
                                    </div>
                                </div>
                                </hr>
                            </br>
                            </div>
                            </hr>
                            </br>
                              <!--close filters on mobile / update filters-->
                             
                            </hr>
                            </br>
                           
                            <!--Type-->
                            <div class="filter-box active">
                            </hr>
                            </br>
                                <div class="title">
                                     {{__(' Category')}}
                                </div>
                                <div class="filter-content">
                                  
                                    @foreach($categories as $category)
                                    <span class="checkbox">
                                    <a href="{{ url('shop?category_id=') }}{{ $category->id }}">
                                    @if(session('locale') == 'En')
                                      <label for="{{$category->id}}">{{$category->name_en}} <i></i></label>
                                    @else
                                    <label for="{{$category->id}}">{{$category->name_ar}} <i></i></label>
                                    @endif
                                        </a>
                                    </span>

                                    @endforeach
                                  
                                </div>
                            </div> <!--/filter-box-->
                            <!--Material-->
                         
                            <!--close filters on mobile / update filters-->
                          

                        </div> <!--/filters-->
                    </div>

                    <!--product items-->

                    <div class="col-md-9 col-xs-12">

                       

        <div class="row">
            @if (count($products) > 0)
            @foreach($products as $product)
            <!-- hover container -->
             @if ($product->photos()->first())
            <div 
            class="w3-modal product-modal-{{ $product->id }}" 
            style="cursor: pointer;background-color: rgba(0,0,0,0.3)!important;z-index: 99999" onclick="$(this).slideUp(200)" >
                <div class="w3-modal-content w3-animate-top" >
                    <img class="image-loupe w3-card" src="{{ $product->photos()->first()->url }}" width="100%" >
                </div>
                <br><br><br>
            </div>
            
              
                <div
            onclick="window.location='{{route('show.product',$product->id)}}'" class="product-item" style="padding: 5px;float: left" >
                    <div class=""  style="box-shadow: 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.12), 0 1px 3px 0 rgba(0,0,0,0.2)!important;" >
                                               
                        <article>
                            
                            @if ($product->canSold())
                            <div class="btn btn-add">
                                <a href="{{route('add.cart.product',$product->id)}}">  <i class="icon icon-cart"></i></a>   
                            </div>
                            @endif
                            
                            <div class="figure-grid">

                                
                                <div class="image" >
                                                  
                                    @if ($product->photos()->first())
                                    <!--
                                    <a href="{{route('show.product',$product->id)}}">  
                                    </a> 
                                    -->             
                                        <div style="background-repeat:no-repeat;" >

                                            <img 
                                            class=""  
                                            style="width: auto!important;padding: 5px" 
                                            height="200px"
                                            src="{{ $product->photos()->first()->url }}" 
                                            onclick="$('.product-modal-{{ $product->id }}').show()"  >

                                        </div>
                                    @endif
                                    
                                    <div>
                                        <center class="w3-padding w3-display-container" >
                                            <a class="w3-large text-left"  href="{{route('show.product',$product->id)}}">
                                                {{$product->name_en}}
                                            </a>
                                            <a href="?category_id={{$product->category_id}}" class="text-left" >
                                                {{optional($product->category)->name_en}}
                                            </a>
                                            <br>
                                            <br>
                                            <div class="w3-display-container" >
                                                <div class="w3-display-bottomleft "   >
                                                    <span class="fa fa-star w3-text-dark-gray w3-tiny" ></span>
                                                    <span class="fa fa-star w3-text-dark-gray w3-tiny" ></span>
                                                    <span class="fa fa-star w3-text-dark-gray w3-tiny" ></span>
                                                    <span class="fa fa-star w3-text-dark-gray w3-tiny" ></span>
                                                    <span class="fa fa-star w3-text-gray w3-tiny" ></span>
                                                </div>
                                                

                                            </div>
                                            <div class="w3-display-bottomright" style="padding: 5px" >
                                                   
                                                    @if ($product->price_ar_discount != null || $product->price_ar_discount > 0)
                                                    <b class="w3-large font-1 w3-text-red" style="text-decoration: line-through;" >EGP {{$product->price_ar}}</b>
                                                    <br> 
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar_discount}}</b>
                                                    @else

                                                    @if ($product->price_ar > 0)
                                                    <br> 
                                                    <b class="w3-large font-1 w3-text-green" >EGP {{$product->price_ar}}</b>
                                                    @endif
                                                    @endif
                                                </div>
                                            
                                        </center>
                                    </div>
                                                    
                                </div>
                  
                            </div>
                        </article>
                                                
                    </div>
                </div>  
            
            @endif
                @endforeach
            @else
            <div class="w3-col w3-block text-center w3-text-red" >
                <br><br>
                <span class="fa fa-search w3-xlarge" ></span>
                <br>
                <b class="w3-large text-capitalize" >{{ __('no products found') }}</b>
            </div>
            
            @endif
                  
               


        </div><!--/row-->
                        <!--Pagination-->
                     
                       
                        
                    </div> <!--/product items-->

                </div><!--/row-->
                <!-- ========================  Product info popup - quick view ======================== -->

          
            </div><!--/container-->
        </section>

@endsection

@push('custom-scripts')
<script src="{{ url('/') }}/js/jquery.loupe.min.js" ></script>
<script>
    function searchWithPrice() {
        var url = '{{ url("shop") }}';

        if ($("#range-price-slider").val().split(";").length > 0) {

            var priceFrom = $("#range-price-slider").val().split(";")[0];
            var priceTo = $("#range-price-slider").val().split(";")[1];

            url += "?price_from="+priceFrom+"&price_to="+priceTo;

            window.location = url;
        }
    }
    
    $('.image-loupe').loupe({
      width: 400, // width of magnifier
      height: 400, // height of magnifier
      loupe: 'loupe' // css class for magnifier
    });



    $(document).ready(function(){
        $(".product-item").each(function(){
            var img = $(this).find("img")[0];
            if (img)
            console.log(img.width + " x " + img.height);
        });
    });
</script>
@endpush