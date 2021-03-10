@extends('website.app')
@section('content')
<!-- ========================  Main header ======================== -->

<section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
    <header>
        <div class="container text-center">
            <h2 class="h2 title">{{__('Checkout')}}</h2>
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

<!-- ========================  Step wrapper ======================== -->

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

<!-- ========================  Checkout ======================== -->

<section class="checkout">
    <div class="container">

        <header class="hidden">
            <h3 class="h3 title"> {{__(' Checkout - Step 2')}}</h3>
        </header>

        <!-- ========================  Cart navigation ======================== -->
 

        <!-- ========================  Delivery ======================== -->

        <div class="cart-wrapper">

            <div class="note-block">
                <div class="row">

                    <!-- === left content === -->

                    <div class="col-md-6">

                        <!-- === login-wrapper === -->

                        <div class="login-wrapper">

                            <div class="white-block">


                                <div class="login-block login-block-signup">

                                    <div class="h4"> {{__(' order information')}}<a href="{{ url('/register') }}" class="btn btn-main btn-xs btn-login pull-right"> {{__(' Log in')}}</a></div>

                                    <hr />
                                    <form action="{{ url('/order/save') }}" method="post" >  
                                        {{ csrf_field() }}
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text"  value="{{ Auth::user()->name }}" name="first_name" class="form-control" placeholder="  {{__(' First name: *')}}" required="" >
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" class="form-control" placeholder=" {{__(' Last name: *')}}" required="">
                                                </div>
                                            </div> 

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="zipcode"  class="form-control" placeholder=" {{__(' Zip code: *')}}" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="city"  class="form-control" placeholder="{{__(' City: * ')}}" required="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="address"  class="form-control" placeholder="{{__('Address: * ')}}" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" value="{{ Auth::user()->email }}" name="email" value="" class="form-control" placeholder="{{__(' Email: * ')}}" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="{{ Auth::user()->phone }}" name="phone"   class="form-control" placeholder=" {{__(' Phone: *')}}" required="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr />
                                                <span class="checkbox">
                                                    <input type="checkbox" id="checkBoxId1" required="">
                                                    <label for="checkBoxId1"> {{__(' I have read and accepted the')}} <a href="#">{{__(' terms')}} </a>,  {{__(' as well as read and understood our terms of')}} <a href="#"> {{__(' business contidions')}}</a></label>
                                                </span>

<!--                                                    <span class="checkbox">
    <input type="checkbox" id="checkBoxId2">
    <label for="checkBoxId2">Subscribe to exciting newsletters and great tips</label>
</span>
<hr />-->
                                            </div>

                                            <div class="col-md-12">
                                                <button href="#" class="btn btn-main btn-block"> {{__(' submit')}} </button>
                                            </div>

                                        </div>
                                    </form>
                                </div> <!--/signup-->
                            </div>
                        </div> <!--/login-wrapper-->
                    </div> <!--/col-md-6-->
                    <!-- === right content === -->

                    <div class="col-md-6">

                        <div class="white-block"> 

                            <hr /> 

                            <div class="clearfix">
                                <p>   {{__(' A frequently overlooked, powerful fulfillment option is offering local pick-up.If you have a physical location and can allow your customers to forgo paying shipping costs altogether, you should!')}} </p> <p><strong> {{__('Benefits:')}}</strong></p>
                                <ul>
                                    <li> {{__(' Avoid both shipping and packaging costs')}}</li>
                                    <li> {{__(' Develop a face-to-face relationship with your customers')}}</li>
                                    <li> {{__(' Potential for additional purchases while customers are at your store')}}</li>
                                </ul>
                                <p><strong> {{__(' Challenges:')}}</strong></p>
                                <ul>
                                    <li> {{__(' Limited business hours can sometimes make it difficult to coordinate pickup')}}</li>
                                    <li> {{__(' Shoppers who cross state lines or ZIP codes may not know the sales tax rates in your area')}}</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- ========================  Cart wrapper ======================== -->

        <div class="cart-wrapper">
            <!--cart header -->

            <div class="cart-block cart-block-header clearfix">
                <div>
                    <span> {{__('Product')}}</span>
                </div>
                <div>
                    <span>&nbsp;</span>
                </div>
                <div>
                    <span> {{__('Quantity')}}</span>
                </div>
                <div class="text-right">
                    <span> {{__('Price')}}</span>
                </div>
            </div>

            <!--cart items-->

            <div class="clearfix">
                @foreach(App\Cart::all() as $product => $amount)
                @if (App\Product::find($product))
                @php 
                $product = App\Product::find($product);
                @endphp
                <div class="cart-block cart-block-item clearfix">
                    <div class="image">
                        <a href="{{ url('/show/product/') }}/{{ $product->id }}"><img src="{{ ($product->photos()->first())? $product->photos()->first()->url : '' }}" alt="" /></a>
                    </div>
                    <div class="title">
                        <div class="h4"><a href="{{ url('/show/product/') }}/{{ $product->id }}">{{ $product->name }}</a></div>
                        <div>{{ $product->category->name }}</div>
                    </div>
                    <div class="quantity">
                        <input type="number" readonly="" value="{{ $amount }}" class="form-control form-quantity" />
                    </div>
                    <div class="price">
                        <span class="final h3">{{ $product->price_ar }} EGP</span> 
                    </div>
                    <!--delete-this-item-->
                    <span class="icon icon-cross icon-delete"  ></span>
                </div>

                </hr>
                </br>
                @endif
                @endforeach 
            </div>

            <!--cart prices -->

            <div class="clearfix">
                <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                    <div>
                        <label for="couponCodeID">{{__('total')}}</label>
                    </div>
                    <div>
                        <div class="h2 title">{{__('EGP')}} {{ App\Cart::getTotal() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================  Cart navigation ======================== -->



    </div> <!--/container-->

</section>
@endsection