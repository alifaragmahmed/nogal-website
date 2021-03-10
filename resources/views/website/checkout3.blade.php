@extends('website.app')
@section('content')
  <!-- ========================  Main header ======================== -->

  <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title"> {{__('Checkout')}}</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="{{ url('shop') }}"><span class="icon icon-home"></span></a></li>
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
                    <h3 class="h3 title">Checkout - Step 3 {{__('Checkout')}}</h3>
                </header>

                <!-- ========================  Cart navigation ======================== -->
 

                <!-- ========================  Payment ======================== -->

                <div class="cart-wrapper">

                    <div class="note-block">

                        <div class="row">
                            <!-- === left content === -->

                            <div class="col-md-6">

                                <div class="white-block">

                                    <div class="h4"> {{__('Order details')}}</div>

                                    <hr />

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Order no.')}}</strong> <br />
                                                <span>{{ $order->id }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>  {{__('Transaction ID')}}</strong> <br />
                                                <span>2265996</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong>  {{__('Order date')}} </strong> <br />
                                                <span>{{ $order->created_at }}</span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="h4"> {{__('Shipping info')}}</div>

                                    <hr />

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Name')}}</strong> <br />
                                                <span>{{ optional($order->user)->name }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Email')}}</strong><br />
                                                <span>{{ $order->email }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Phone')}}</strong><br />
                                                <span>{{ $order->phone }}</span>
                                            </div>
                                        </div>                                      

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Zip')}}</strong><br />
                                                <span>{{ $order->zipcode }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('City')}}</strong><br />
                                                <span>{{ $order->city }}</span>
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong> {{__('Address')}}</strong><br />
                                                <span>{{ $order->address }}</span>
                                            </div>
                                        </div> 
 

                                        
                                    </div>

                                </div> <!--/col-md-6-->

                            </div>

                            <!-- === right content === -->

                            <div class="col-md-6">
                                <div class="white-block"> 
                                    <hr />

                                    <p>{{__('Please allow three working days for the payment confirmation to reflect in your <a href="#">online account</a>. Once your payment is confirmed, we will generate your e-invoice, which you can view/print from your account or email.')}}</p>
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
                        @foreach($order->details()->get() as $detail) 
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="{{ url('/show/product/') }}/{{ $detail->product->id }}"><img src="{{ ($detail->product->photos()->first())? $detail->product->photos()->first()->url : '' }}" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="{{ url('/show/product/') }}/{{ $detail->product->id }}">{{ $detail->product->name }}</a></div>
                                <div>{{ $detail->product->category->name }}</div>
                            </div>
                            <div class="quantity">
                                <input type="number" readonly="" value="{{ $detail->amount }}" class="form-control form-quantity" />
                            </div> 
                            <div class="price">
                                <span class="final h3">{{ $detail->price }} {{__('EGP')}} </span> 
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete"  ></span>
                        </div> 
                        @endforeach 
                    </div>

                    <!--cart prices -->

                    <div class="clearfix"> 
 
 
                    </div>

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div>
                                <label for="couponCodeID"> {{__('total')}}</label>
                            </div>
                            <div>
                                <div class="h2 title">{{__('EGP')}} {{ $order->total }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================  Cart navigation ======================== -->
 


            </div> <!--/container-->

        </section>


@endsection