@extends('website.app')
@section('content')
 <!-- ========================  Main header ======================== -->
 
        <section class="main-header" style="background-image:url(website/assets/images/project-3.jpg)"> 
            <header>
                <div class="container">
                    <h1 class="h2 title">{{$product->name_en}}</h1>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href=""><span class="icon icon-home"></span></a></li>
                        <li><a href="{{ url('/shop') }}?category_id={{ $product->category_id }}">{{$product->Category->name}}</a></li>
                       
                        <li><a class="active" > {{__('Product overview')}}</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Product ======================== -->

        <section class="product">
            <div class="main">
                <div class="container">
                    <div class="row product-flex">

                        <!-- product flex is used only for mobile order -->
                        <!-- on mobile 'product-flex-info' goes bellow gallery 'product-flex-gallery' -->

                        <div class="col-md-4 col-sm-12 product-flex-info">
                            <div class="clearfix">

                                <!-- === product-title === -->
                                @if(session('locale') == 'En')
                                <h1 class="title" data-title="">{{$product->name_en}} <small>{{$product->description_en}}</small></h1>
                                @else
                                <h1 class="title" data-title="">{{$product->name_ar}} <small>{{$product->description_ar}}</small></h1>
                              
                                @endif
                                <div class="clearfix">
    
                                    <!-- === price wrapper === -->
 
                                    <hr />
                                    <table class="table" >
                                        <tr>
                                            <td>
                                                <strong> {{__('price')}}</strong> 
                                            </td>
                                            <td>
                                                <b class="w3-text-red" >{!! $product->price_ar !!} EGP</b>
                                            </td>
                                        </tr>
                                        
                                        @if ($product->item)
                                        <tr>
                                            <td>
                                                <strong> {{__('item')}}</strong>
                                            </td>
                                            <td>
                                                 {{ $product->item }}
                                            </td>
                                        </tr>
                                        @endif
                                        
                                    @if ($product->colors()->count() > 0)
                                        <tr>
                                            <td>
                                                <strong> {{__('color')}}</strong>
                                            </td>
                                            <td>
                                                 
                                        @foreach($product->colors()->get() as $item)
                                        <img 
                                        src="{{ $item->url }}"  
                                        style="border-radius: 6px;width: 40px;height: 40px"  />
                                        @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($product->brand)
                                        <tr>
                                            <td>
                                                <strong> {{__('brand')}}</strong>
                                            </td>
                                            <td>
                                                 {{ $product->brand }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($product->material)
                                        <tr>
                                            <td>
                                                <strong> {{__('material')}}</strong>
                                            </td>
                                            <td>
                                                 {{ $product->material }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($product->dimension)
                                        <tr>
                                            <td>
                                                <strong> {{__('dimension')}}</strong>
                                            </td>
                                            <td>
                                                 <pre style="border: none;background: transparent;padding: 0px;margin: 0px" >{!! str_replace('"', '', $product->dimension) !!}</pre>
                                            </td>
                                        </tr>
                                    @endif
                                        
                                    @if ($product->seat_depth)
                                        <tr>
                                            <td>
                                                <strong> {{__('seat depth')}}</strong>
                                            </td>
                                            <td>
                                        <span>{{ $product->seat_depth }}</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($product->frame_material)
                                        <tr>
                                            <td>
                                                <strong> {{__('frame material')}}</strong>
                                            </td>
                                            <td>
                                        <span>{{ $product->frame_material }}</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($product->shipping_price != $product->price_ar)
                                        <tr>
                                            <td>
                                                <strong> {{__('Shipping Price')}}</strong>
                                            </td>
                                            <td>
                                                <span>{{ $product->shipping_price }} EGP</span>
                                            </td>
                                        </tr>
                                    @endif
                                    </table>
    
 

                                    <hr />
                                    <div>
                                        {{ __('All prices include VAT') }} <a class="w3-text-blue"  onclick="$('.vat-details').slideToggle(400)" ><b>{{ __('Details') }}</b></a>
                                    </div>
                                    <p class='vat-details' style='display: none' >
                                         <br>
                                        DETAILS: Value-Added Tax <br>
                                        As per Egyptian Tax regulations, VAT is charged at 14% on orders sold and shipped by NOGAL FURNITURE within the Egypt. <br>
                                        
                                        The advertised prices for products displayed at Our website are inclusive of any VAT in accordance with the Egypt VAT law. <br>
                                    </p>
                                    <br>
                                    <div>
                                        {{ __('Free Shipping') }} <a class="w3-text-blue"  onclick="$('.shopping-details').slideToggle(400)" ><b>{{ __('Details') }}</b></a>
                                    </div>
                                    <p class='shopping-details' style='display: none' >
                                        <br>
                                        Details : All orders of 1500 EGP or more of eligible items across any product category qualify for FREE Shipping. <br>
                                        This program is available only to all Cairo within 24 hrs. <br>
                                    </p>
                                    

                                    <hr />

                                    <!-- === info-box === -->

                                   

                                    <!-- === info-box === -->


                                </div> <!--/clearfix-->
                            </div> <!--/product-info-wrapper-->
                        </div> <!--/col-md-4-->
                        <!-- === product item gallery === -->

                        <div class="col-md-8 col-sm-12 product-flex-gallery">

                            <!-- === add to cart === -->


                           
                                
                            @if ($product->canSold())
                            <a href="{{route('add.cart.product',$product->id)}}">
                            <button type="submit" class="btn btn-buy" data-text="Buy"></button>
                            </a>
                            @endif

                            <!-- === product gallery === -->
                            <div class="owl-product-gallery open-popup-gallery owl-carousel owl-theme product-show-carsousel"> 
                              
                            @foreach ($product->photos()->get() as $image)
                            
                                <a href="{{  $image->url }}"  class="mfp-open item">
                          
                           
                              
                               <div style="background-repeat:no-repeat;" >

                                <img class="" src="{{ $image->url }}" style="height:70%;width:70%;"   >

                              </div>
                              
                               </a> 
                          
                                      <!-- ===   <img   src="{{  $image->url }}" style="height: 500px!important;"  alt="">
                              === -->             
                                @endforeach
                             
                                   </div>
                          
                        </div>

                    </div>
                </div>
            </div>

            <!-- === product-info === -->

           <!--/info-->
        </section>

      

@endsection