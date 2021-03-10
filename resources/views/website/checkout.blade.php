@extends('website.app')
@section('content')
  <!-- ========================  Main header ======================== -->

    <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title"> {{__('Checkout')}}</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="{{ url('/shop') }}"><span class="icon icon-home"></span></a></li>
                        <li><a class="active" href="{{ url('/checkout') }}">  {{__('Cart items')}}</a></li>
                        <li><a href="{{ url('/checkout2') }}"> {{__(' Delivery')}}</a></li>
                        <li><a href="{{ url('/checkout3') }}"> {{__(' Payment')}}</a></li>
                        <li><a href="{{ url('/checkout4') }}"> {{__(' Receipt')}}</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Checkout ======================== -->

        <div class="step-wrapper">
            <div class="container">

                <div class="stepper">
                    <ul class="row">
                        <li class="col-md-3 active">
                            <span data-text="{{__('Cart items')}}"></span>
                        </li>
                        <li class="col-md-3">
                            <span data-text="{{__(' Delivery')}}"></span>
                        </li>
                        <li class="col-md-3">
                            <span data-text="{{__(' Payment')}}"></span>
                        </li>
                        <li class="col-md-3">
                            <span data-text="{{__(' Receipt')}}"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <section class="checkout">

            <div class="container">

                <header class="hidden">
                    <h3 class="h3 title">   {{__(' Checkout - Step 1')}}</h3>
                </header>

                <!-- ========================  Cart wrapper ======================== -->

                <div class="cart-wrapper table-responsive">
                    <!--cart header -->
                    
                    <table class="table table-bordered w3-light-gray" >
                        <tr>
                            <th></th>
                            <th>{{__('  Product')}}</th>
                            <th>{{__('category')}}</th>
                            <th>{{__('  Quantity')}}</th>
                            <th>{{__('price per unit')}}</th>
                            <th>{{__('total')}}</th>
                        </tr>
                        
                        @foreach(App\Cart::all() as $product => $amount)
                        @if (App\Product::find($product))
                        @php 
                        $product = App\Product::find($product);
                        @endphp
                        <tr>
                            <td>
                               <div class="image">
                                    <a href="{{ url('/show/product/') }}/{{ $product->id }}"><img width="70px" class="w3-round" src="{{ ($product->photos()->first())? $product->photos()->first()->url : '' }}" alt="" /></a>
                                </div> 
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ optional($product->category)->name }}</td>
                            <td>
                                <div  >
                                    <input type="number"  value="{{ $amount }}" class="form-control form-quantity" style="float: left!important" />
                                    <br>
                                    <button class="btn btn-default" style="float: left!important" onclick="window.location='{{ url('/add-to-cart') }}/{{ $product->id }}?status=renew&amount='+$(this).parent().find('.form-quantity').val()" >{{ __('update cart') }}</button>
                                </div>
                            </td>
                            <td>
                                {{ $product->price_ar }} EGP
                            </td>
                            <td>
                                {{ $product->price_ar * $amount }}
                            </td>
                            <td>
                                <a 
                                href="#"
                                onclick='confirm("{{ __('are you sure') }}")? window.location="{{ url('remove-from-cart') }}/{{ $product->id }}" : "" '  ><span class="btn w3-red btn-small icon icon-cross icon-delete"  > </span></a>
                            </td>
                        </tr>
                        @endif
                        @endforeach 
                    </table>

                  
                    <!--cart prices -->

                    <div class="clearfix"> 
 
 
                    </div>

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div>
                                <label for="couponCodeID">  {{__('  total')}}</label>
                            </div>
                            <div>
                                <div class="h2 title">  {{__('  EGP')}} {{ App\Cart::getTotal() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ url('/shop') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span>  {{__('  Shop more')}} </a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="{{ url('/checkout2') }}" class="btn btn-main"><span class="icon icon-cart"></span>   {{__('  Proceed to delivery')}}</a>
                        </div>
                    </div>
                </div>

            </div> <!--/container-->

        </section>

        
@endsection